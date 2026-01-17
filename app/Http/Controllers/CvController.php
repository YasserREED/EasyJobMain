<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\CvService;
use App\Models\CvFree;
use App\Models\Company;
use App\Models\Payment;
use App\Models\Discount;
use App\Models\UserInfo;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\Facades\Image as Image;

use App\Rules\NotExecutableFile;
use App\Rules\SafeFilename;

use App\Jobs\SendEmails;

use RealRashid\SweetAlert\Facades\Alert;

use Clickpaysa\Laravel_package\Facades\paypage;

use Session;

class CvController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('domains');
    }


    public function index()
    {
        $storedService = CvService::where('user_id', Auth::user()->id)->latest()->first();
        if (empty($storedService)) {
            $storedService = CvFree::where('user_id', Auth::user()->id)->latest()->first();
        }
        $storedData = UserInfo::where('user_id', Auth::user()->id)->first();
        return view('client.CV.CV', compact('storedData', 'storedService'));
    }



    public function domains(Request $request)
    {
        $this->validate($request, [
            'region' => 'required|integer|between:1,3',
        ]);

        $region = $request->input('region');
        // Perform a query to get the available domains for the selected region
        $availableDomains = Company::where('region', $region)->groupBy('domain')->pluck('domain');

        if ($availableDomains->isEmpty()) {
            return response()->json(['' => 'No domains available']);
        }

        return response()->json($availableDomains);
    }

    public function getPrice($plan)
    {
        switch ($plan) {
            case 1:
                return 29;
            case 2:
                return 85;
            case 3:
                return 99;
            default:
                return 100; // Handle unsupported plans or errors as needed
        }
    }

    public function getName($plan)
    {
        switch ($plan) {
            case 1:
                return "باقة بريميوم";
            case 2:
                return "باقة بريميوم بلس";
            case 3:
                return "باقة برو";
            default:
                return "UnKnown"; // Handle unsupported plans or errors as needed
        }
    }

    private function caldiscount($price, $dis = 0)
    {
        $myNumber = $price;

        $percentToGet = $dis;

        $percentInDecimal = $percentToGet / 100;

        $percent = $percentInDecimal * $myNumber;

        return $percent;
    }

    public function create(Request $request)
    {

        $this->validate($request, [
            'subject' => ['bail', 'required', 'string', 'max:60'],
            'region' => ['bail', 'required', 'integer', 'between:1,3'],
            'domain' => ['bail', 'required', 'string', 'max:55', 'exists:companies,domain'], // depends on the dataSet
            'discount' => ['bail', 'nullable', 'max:255'],
            'fullname' => ['bail', 'required', 'string', 'max:80', 'full_name_parts'],
            'age' => ['bail', 'required', 'integer', 'between:1,5'],
            'qualifications' => ['bail', 'required', 'string', 'max:60'],
            'university' => ['bail', 'required', 'string', 'max:60'],
            'major' => ['bail', 'required', 'string', 'max:60'],
            'work' => ['bail', 'nullable', 'string', 'max:60'],
            'experince' => ['bail', 'nullable', 'integer', 'max:60'],
            'birthday' => ['bail', 'required', 'date', 'before_or_equal:' . now()->subYears(18)->format('Y-m-d')],
            'gender' => ['bail', 'required', 'integer', 'between:1,2'],
            'socialStatus' => ['bail', 'required', 'integer', 'between:1,3'],
            'nationality' => ['bail', 'required', 'string', 'max:10'],
            'linkedin' => ['bail', 'nullable', 'string', 'max:80'],
            'file' => [
                'bail',
                'nullable',
                'file',
                'mimes:pdf',
                'mimetypes:application/pdf,',
                'max:10240', // Maximum file size of 10MB
                // 'dimensions:min_width=1,min_height=1', // Minimum dimensions
                new NotExecutableFile(), // Ensure the file is not executable
                new SafeFilename(), // Validate the filename for security
            ],
            'selectedPlan' => ['bail', 'required', 'integer', 'between:1,3'],

        ], [
            'birthday.before_or_equal' => 'يجب أن يكون عمرك 18 عامًا أو أكثر لإستخدام هذه الخدمة',
        ]);

        try {
            if ($request->hasFile('file')) {

                $file = $request->file('file');
                $fileName = uniqid() . '.' . $file->extension();

                $destinationPath = "CVs";

                if (!Storage::disk('public')->exists($destinationPath)) {
                    Storage::disk('public')->makeDirectory($destinationPath);
                }

                $fileFinal = File::get($file);

                Storage::disk('public')->put($destinationPath . '/' . $fileName, $fileFinal);

                $filelink = Storage::url($destinationPath . '/' . $fileName);
            } else {
                // If the 'file' field is empty, look for the file in the database
                $storedService = CvService::where('user_id', Auth::user()->id)->latest()->first();
                if (empty($storedService)) {
                    $storedService = CvFree::where('user_id', Auth::user()->id)->latest()->first();
                }

                if ($storedService) {
                    $destinationPath = "CVs";
                    $filelink = Storage::url($destinationPath . '/' . $storedService->cv_file); // 'cv_file' is the column that holds the file name 
                    $fileName = $storedService->cv_file;
                } else {
                    // Return an error if the file field is empty, and there's no stored data in the database
                    return back()->withErrors(['file' => 'يرجى إرفاق السيرة الذاتية']);
                }
            }
        } catch (\Exception $e) {
            \Log::error('File upload error: ' . $e->getMessage());
            return back()->withErrors(['file' => 'حدث خطأ أثناء رفع الملف. يرجى المحاولة مرة أخرى']);
        }

        $price = $this->getPrice((int) $request->selectedPlan);

        if ($request->has('discount') && !empty($request->discount)) {
            $coupon = Discount::where('coupon', trim($request->discount))
                ->where('status', 1);
            if ($coupon->exists()) {
                $per = (int) $coupon->first()->discount;

                $discountAmount = $this->caldiscount($price, $per);
                $price = $price - $discountAmount;
                session(['couponid' => $coupon->first()->id]);
            } else {
                return redirect()->back()
                    ->withErrors(['discount' => 'كوبون غير صالح']);
            }
        }

        if ($price > 0) {
            session([
                'subject' => trim($request->subject),
                'region' => (int) $request->region,
                'domain' => trim($request->domain),
                'cv_file' => $fileName,
                'filelink' => $filelink,
                'plan' => $request->selectedPlan,
                'fullname' => $request->fullname,
                'age' => $request->age,
                'qualifications' => $request->qualifications,
                'university' => $request->university,
                'major' => $request->major,
                'work' => $request->work,
                'experince' => $request->experince,
                'birthDay' => $request->birthday,
                'gender' => $request->gender,
                'socialStatus' => $request->socialStatus,
                'nationality' => $request->nationality,
                'linkedin' => $request->linkedin,

            ]);

            // Payment

            $pay = paypage::sendPaymentCode('all')
                ->sendTransaction('sale')
                ->sendCart(00, $price, $this->getName($request->selectedPlan))
                ->sendURLs(route('cv.payment.verify'), route('cv.index'))
                ->sendHideShipping(true)
                ->sendUserDefined(["plan" => $request->selectedPlan])
                ->sendLanguage('ar')
                ->create_pay_page();

            return $pay;
        } else {
            // handle 100% coupons

            $newCV = CvService::create([
                'user_id'   => Auth::id(),
                'subject' => $request->subject,
                'region' => $request->region,
                'domain' => $request->domain,
                'cv_file' => $fileName,
                'plan' => $request->selectedPlan,
            ]);


            $newUserInfo = UserInfo::updateOrCreate([
                'user_id'   => Auth::id(),
            ], [
                'fullname' => $request->fullname,
                'age' => $request->age,
                'qualifications' => $request->qualifications,
                'university' => $request->university,
                'major' => $request->major,
                'work' => $request->work,
                'experince' => $request->experince,
                'birthDay' => $request->birthday,
                'gender' => $request->gender,
                'socialStatus' => $request->socialStatus,
                'nationality' => $request->nationality,
                'linkedin' => $request->linkedin,

            ]);

            if ($newCV && $newUserInfo) {
                // Success: Model was created
                Discount::find($coupon->first()->id)->increment('count');

                $userEmail = Auth::user()->email;
                $userPhone = Auth::user()->phone;
                $userName = Auth::user()->name;
                $region = $request->region;
                $domain = $request->domain;
                $subject = $request->subject;
                $plan = $request->selectedPlan;
                $linkedin = $request->linkedin;

                $CV = secure_url($fileName);

                // Split the full name into an array of parts
                $nameParts = explode(' ', $request->fullname);

                // Take the first two parts
                $firstTwoParts = implode(' ', array_slice($nameParts, 0, 2));

                // Send Emails
                dispatch(new SendEmails($CV, $plan, $region, $domain, $subject, $userEmail, $userPhone, $userName, $firstTwoParts, $linkedin));

                alert()->success('تم الإرسال بنجاح')->showConfirmButton('حسناً');
                return redirect()->route('cv.show');
            } else {
                // Error: Model creation failed
                alert()->error('فشلت عملية الإرسال')->showConfirmButton('حسناً');
                return redirect()->back();
            }
        }
    }

    public function show()
    {
        $list = CvService::forUser(Auth::id())->with('user')->get();
        $freeList = CvFree::forUser(Auth::id())->with('user')->get();

        return view('client.CV.list', compact('list', 'freeList'));
    }

    public function verify(Request $request)
    {

        $this->validate($request, [
            'tranRef' => ['bail', 'required', 'string', 'max:50', 'unique:payments,tran_ref'],
        ]);

        try {
            $transaction = Paypage::queryTransaction(trim($request->tranRef));

            if ($transaction->success) {

                $couponId = null;
                if ($request->session()->has('couponid')) {
                    $couponId = (int) session('couponid');
                    // Verify coupon still exists and is valid
                    $coupon = Discount::find($couponId);
                    if ($coupon && $coupon->status == 1) {
                        $coupon->increment('count');
                    } else {
                        \Log::warning('Invalid coupon used: ' . $couponId . ' by user ' . Auth::id());
                    }
                }

                // Validate all session data before creation
                $sessionData = [
                    'subject' => Session::get('subject'),
                    'region' => (int) Session::get('region'),
                    'domain' => Session::get('domain'),
                    'cv_file' => Session::get('cv_file'),
                    'plan' => (int) Session::get('plan'),
                ];

                // Validate ranges
                if (!in_array($sessionData['region'], [1, 2, 3]) || !in_array($sessionData['plan'], [1, 2, 3])) {
                    \Log::error('Invalid session data detected for user: ' . Auth::id());
                    return back()->withErrors(['error' => 'البيانات المرسلة غير صحيحة']);
                }

                $newCV = CvService::create($sessionData);

                $newUserInfo = UserInfo::updateOrCreate([
                    'user_id'   => Auth::id(),
                ], [
                    'fullname' => trim(Session::get('fullname')),
                    'age' => (int) Session::get('age'),
                    'qualifications' => trim(Session::get('qualifications')),
                    'university' => trim(Session::get('university')),
                    'major' => trim(Session::get('major')),
                    'work' => trim(Session::get('work')),
                    'experince' => (int) Session::get('experince'),
                    'birthDay' => Session::get('birthDay'),
                    'gender' => (int) Session::get('gender'),
                    'socialStatus' => (int) Session::get('socialStatus'),
                    'nationality' => trim(Session::get('nationality')),
                    'linkedin' => trim(Session::get('linkedin')),
                ]);

                $payment = Payment::create([
                    'user_id'   => Auth::id(),
                    'cv_service' => $newCV->id,
                    'tran_ref' => trim($request->tranRef),
                    'cart_description' => trim($transaction->cart_description ?? ''),
                    'cart_currency' => trim($transaction->cart_currency ?? ''),
                    'tran_total' => (float) $transaction->tran_total,
                    'customer_name' => trim($transaction->customer_details->name ?? ''),
                    'customer_email' => trim($transaction->customer_details->email ?? ''),
                    'payment_method' => trim($transaction->payment_info->payment_method ?? ''),
                    'trace' => trim($transaction->trace ?? ''),
                    'discount_id' => $couponId
                ]);

                if ($newCV && $payment && $newUserInfo) {
                    // Success: Model was created

                    $userEmail = Auth::user()->email;
                    $userPhone = Auth::user()->phone;
                    $userName = Auth::user()->name;
                    $region = (int) Session::get('region');
                    $domain = trim(Session::get('domain'));
                    $subject = trim(Session::get('subject'));
                    $plan = (int) Session::get('plan');
                    $linkedin = trim(Session::get('linkedin') ?? '');
                    $CV = secure_url(Session::get('filelink'));

                    // Split the full name into an array of parts
                    $nameParts = explode(' ', trim(Session::get('fullname')));

                    // Take the first two parts
                    $firstTwoParts = implode(' ', array_slice($nameParts, 0, 2));

                    // Send Emails
                    dispatch(new SendEmails($CV, $plan, $region, $domain, $subject, $userEmail, $userPhone, $userName, $firstTwoParts, $linkedin));

                    alert()->success('تم الإرسال بنجاح')->showConfirmButton('حسناً');
                    return redirect()->route('cv.show');
                } else {
                    // Error: Model creation failed
                    alert()->error('فشلت عملية الإرسال')->showConfirmButton('حسناً');
                    return redirect()->back();
                }
            } else {
                alert()->error('فشلت عملية الدفع')->showConfirmButton('حسناً');
                return redirect()->route('cv.show');
            }
        } catch (\Exception $e) {
            \Log::error('Payment verification error: ' . $e->getMessage(), ['user_id' => Auth::id()]);
            alert()->error('حدث خطأ أثناء التحقق من الدفع')->showConfirmButton('حسناً');
            return redirect()->back();
        }
    }
}
