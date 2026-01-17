<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\cv_free;
use App\Models\UserInfo;

use App\Models\Company;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\Facades\Image as Image;

use App\Rules\NotExecutableFile;
use App\Rules\SafeFilename;
use App\Jobs\SendEmails;

use App\Rules\phone;


use Twilio\Rest\Client;
use Twilio\Exceptions\RestException;
use Twilio\Exceptions\VerificationException;

use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;

use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;

class FreeCvController extends Controller
{
    public function index()
    {
        return view('client.CV.free');
    }


    public function create(Request $request)
    {
        // Determine if the user is authenticated
        $isAuthenticated = Auth::check();

        $rules = [
            'subject' => ['bail','required', 'string', 'max:60'],
            'region' => ['bail','required', 'integer', 'between:1,3'],
            'domain' => ['bail','required', 'string', 'max:55', 'exists:companies,domain'],
            'fullname' => ['bail','required', 'string', 'max:80' , 'full_name_parts'],
            'age' => ['bail','required', 'integer', 'between:1,5'],
            'qualifications' => ['bail','required', 'string', 'max:60'],
            'university' => ['bail','required', 'string', 'max:60'],
            'major' => ['bail','required', 'string', 'max:60'],
            'work' => ['bail','nullable', 'string', 'max:60'],
            'experince' => ['bail','nullable', 'integer','max:60'],
            'birthday' => ['bail','required', 'date', 'before_or_equal:' . now()->subYears(18)->format('Y-m-d')],
            'gender' => ['bail','required', 'integer', 'between:1,2'],
            'socialStatus' => ['bail','required', 'integer', 'between:1,3'],
            'nationality' => ['bail','required', 'string', 'max:10'],
            'linkedin' => ['bail','nullable', 'string', 'max:80'],
            'file' => [
                'required',
                'bail',
                'file',
                'mimes:pdf',
                'mimetypes:application/pdf',
                'max:10240', // Maximum file size of 10MB
                new NotExecutableFile(), // Ensure the file is not executable
                new SafeFilename(), // Validate the filename for security
            ],
        ];
        
        // If the user is not authenticated (guest), add registration-related rules
        if (!$isAuthenticated) {
            $rules += [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone' => ['required', 'string', 'max:255', new phone],
                'dial_code' => [
                    'required',
                    'unique:users,phone',
                    new phone,
                ],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ];
        }

        // Validate the request data
        $this->validate($request, $rules, [
            'dial_code.unique' => 'رقم الهاتف مستخدم مسبقاً',
            'birthday.before_or_equal' => 'يجب أن يكون عمرك 18 عامًا أو أكثر لإستخدام هذه الخدمة',
        ]);

        
        if ($isAuthenticated) {
            // Handle the case for authenticated users

            // Check if the user has used the service before
            $userID = Auth::id();
            if (cv_free::where('user_id', $userID)->exists()) {
                // User has used the service before
                alert()->info('لقد استخدمت الخدمة من قبل')->showConfirmButton('حسناً');
                return redirect()->route('cv.show');
            } else {

            $file = $request->file('file');
            $fileName = uniqid().'.'.$file->extension();
    
            $destinationPath = "CVs";
    
            if(!Storage::disk('public')->exists($destinationPath)){
                Storage::disk('public')->makeDirectory($destinationPath);
            }
            
            $fileFinal = File::get($file);
            
            Storage::disk('public')->put($destinationPath . '/'.$fileName, $fileFinal);
    
            $filelink = Storage::url($destinationPath.'/'.$fileName);
    
            
            $newUserInfo = UserInfo::updateOrCreate([
                'user_id'   => Auth::id(),
            ],[
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

            $newCV = cv_free::create([
                'user_id'   => Auth::id(),
                'subject' => $request->subject,
                'region' => $request->region,
                'domain' => $request->domain,
                'cv_file' => $fileName,
            ]);
    
            if ($newCV && $newUserInfo) {
            // Success: Model was created
    
                $userEmail = Auth::user()->email;
                $userPhone = Auth::user()->phone;
                $userName = Auth::user()->name;
                $region = $request->region;
                $domain = $request->domain;

                $subject = $request->subject;
                $linkedin = $request->linkedin;

                $plan = 4; // free plan
                $CV = secure_url($filelink);

                // Split the full name into an array of parts
                $nameParts = explode(' ', $request->fullname);

                // Take the first two parts
                $firstTwoParts = implode(' ', array_slice($nameParts, 0, 2));

                // Send Emails
                dispatch(new SendEmails($CV, $plan, $region,$domain,$subject,$userEmail,$userPhone,$userName,$firstTwoParts,$linkedin));
    
                alert()->success('تم الإرسال بنجاح')->showConfirmButton('حسناً');
                return redirect()->route('cv.show');
    
            } else {
                // Error: Model creation failed
                alert()->error('فشلت عملية الإرسال')->showConfirmButton('حسناً');
                return redirect()->back();
    
            }
        }
        } else {
        // Handle the case for guest registration

        // Rate Limiting
        $rateLimitKey = 'sms_verification.' . $request->ip();
        $rateLimitMaxAttempts = 5; // Adjust as needed
        $rateLimitDecayMinutes = 60; // Adjust as needed

        if (RateLimiter::tooManyAttempts($rateLimitKey, $rateLimitMaxAttempts)) {
            return back()->withErrors(['error' => 'تم  الكشف عن العديد من طلبات التحقق عبر الرسائل النصية. الرجاء المحاولة مرة أخرى في وقت لاحق.']);
        }

        try {
            event(new Registered($user = $this->sendSMS($request->all())));
        } catch (RestException $e) {
            // Handle Twilio REST API-related errors
            return back()->withErrors(['error' => 'رقم غير صحيح , فشلت عملية الإرسال']);
        } catch (VerificationException $e) {
            // Handle Twilio verification-related errors
            return back()->withErrors(['error' => 'رقم غير صحيح , فشلت عملية الإرسال']);
        }
        
        RateLimiter::hit($rateLimitKey, $rateLimitDecayMinutes);


        $file = $request->file('file');
        $fileName = uniqid().'.'.$file->extension();

        $destinationPath = "CVs";

        if(!Storage::disk('public')->exists($destinationPath)){
            Storage::disk('public')->makeDirectory($destinationPath);
        }
        
        $fileFinal = File::get($file);
        
        Storage::disk('public')->put($destinationPath . '/'.$fileName, $fileFinal);

        $filelink = Storage::url($destinationPath.'/'.$fileName);

        $request->session()->flush();

        session([
            'name' => $request->name,
            'email' => $request->email,
            'phoneNum' => $request->dial_code,
            'password' => $request->password,
            'verification' => true,
            'subject' => $request->subject,
            'region' => $request->region,
            'domain' => $request->domain,
            'cv_file' => $fileName,
            'filelink' => $filelink,
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
        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect()->route('cv.free.verify');

        }
    

    }

    public function verifyPhone(Request $request)
    {
        if ($request->session()->has('phoneNum')) {
            return view('client.CV.sms');

        }	
        
        return redirect()->route('register');

    }
    protected function sendSMS(array $data)
    {
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        $twilio->verify->v2->services($twilio_verify_sid)
            ->verifications
            ->create($data['dial_code'], "sms");
    }




    protected function verify(Request $request)
    {
        $data = $request->validate([
            'verification_code' => ['required', 'numeric'],
            'phone' => ['required', new phone],
        ]);

        try {

        /* Get credentials from .env */
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        $verification = $twilio->verify->v2->services($twilio_verify_sid)
        ->verificationChecks
        ->create(['code' => $data['verification_code'], 'to' => $data['phone']]);
            
        } catch (RestException $e) {
            // Handle Twilio REST API-related errors
            return redirect()->route('verify')->withErrors(['error' => 'رمز تحقق خاطىء']);
        } catch (VerificationException $e) {
            // Handle Twilio verification-related errors
            return redirect()->route('verify')->withErrors(['error' => 'رمز تحقق خاطىء']);
        }

        if ($verification->valid) {
            $user = User::create([
                'name' => Session::get('name'),
                'email' => Session::get('email'),
                'phone' => $data['phone'],
                'password' => Hash::make(Session::get('password')),
                'isVerified' => true
            ]);

            $user_id = $user->id;
            //go with the normal flow of the free service

            $newUserInfo = UserInfo::updateOrCreate([
                'user_id'   => $user_id,
            ],[
                'fullname' => Session::get('fullname'),
                'age' => Session::get('age'),
                'qualifications' => Session::get('qualifications'),
                'university' => Session::get('university'),
                'major' => Session::get('major'),
                'work' => Session::get('work'),
                'experince' => Session::get('experince'),
                'birthDay' => Session::get('birthDay'),
                'gender' => Session::get('gender'),
                'socialStatus' => Session::get('socialStatus'),
                'nationality' => Session::get('nationality'),
                'linkedin' => Session::get('linkedin'),
            ]);

            $newCV = cv_free::create([
                'user_id'   => $user_id,
                'subject' => Session::get('subject'),
                'region' => Session::get('region'),
                'domain' => Session::get('domain'),
                'cv_file' => Session::get('cv_file'),
            ]);
    
            if ($newCV && $newUserInfo) {
            // Success: Model was created
    
                $userEmail = $user->email;
                $userPhone = $user->phone;
                $userName = $user->name;
                $region = Session::get('region');
                $domain = Session::get('domain');

                $subject = Session::get('subject');
                $plan = 4; // free plan
                $linkedin = Session::get('linkedin');

                $CV = secure_url(Session::get('filelink'));


                // Split the full name into an array of parts
                $nameParts = explode(' ', Session::get('fullname'));

                // Take the first two parts
                $firstTwoParts = implode(' ', array_slice($nameParts, 0, 2));
                
                // Send Emails
                dispatch(new SendEmails($CV, $plan, $region,$domain,$subject,$userEmail,$userPhone,$userName,$firstTwoParts,$linkedin));
    
                $request->session()->flush();

                Auth::login($user);    
                alert()->success('تم الإرسال بنجاح')->showConfirmButton('حسناً');
                return redirect()->route('cv.show');
    
            } else {
                // Error: Model creation failed
                alert()->error('فشلت عملية الإرسال')->showConfirmButton('حسناً');
                return redirect()->back();
    
            }
        }
        return back()->with(['phone' => $data['phone']])->withErrors(['error' => 'رمز التحقق غير صحيح']);
    }
}
