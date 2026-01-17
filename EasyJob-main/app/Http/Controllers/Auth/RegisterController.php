<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;
use Twilio\Exceptions\RestException;
use Twilio\Exceptions\VerificationException;

use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;

use App\Rules\phone;

use Session;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function showRegistrationForm(Request $request)
    {

        if ($request->session()->has('phoneNum')) {
            return view('auth.verify');

        }	
        return view('auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255', new phone],
            'dial_code' => [
                'bail',
                'required',
                'unique:users,phone',
                new phone,
            ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'dial_code.unique' => 'رقم الهاتف مستخدم مسبقاً',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
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
            // tap(User::where('phone', $data['phone']))->update(['isVerified' => true]);
            /* Authenticate user */
            $request->session()->flush();

            Auth::login($user->first());
            return redirect()->route('home')->with(['message' => 'تم التفعيل بنجاح']);
        }
        return back()->with(['phone' => $data['phone']])->withErrors(['error' => 'رمز التحقق غير صحيح']);
    }


    public function verifyPhone(Request $request)
    {
        if ($request->session()->has('phoneNum')) {
            return view('auth.verify');

        }	
        
        return redirect()->route('register');


    }
    // overwriting the method register from laravel ui

    public function register(Request $request)
    {
         // Rate Limiting
        $rateLimitKey = 'sms_verification.' . $request->ip();
        $rateLimitMaxAttempts = 5; // Adjust as needed
        $rateLimitDecayMinutes = 60; // Adjust as needed

        if (RateLimiter::tooManyAttempts($rateLimitKey, $rateLimitMaxAttempts)) {
            return back()->withErrors(['error' => 'تم  الكشف عن العديد من طلبات التحقق عبر الرسائل النصية. الرجاء المحاولة مرة أخرى في وقت لاحق.']);
        }

        $this->validator($request->all())->validate();

        try {
            event(new Registered($user = $this->create($request->all())));
        } catch (RestException $e) {
            // Handle Twilio REST API-related errors
            return back()->withErrors(['error' => 'رقم غير صحيح , فشلت عملية الإرسال']);
        } catch (VerificationException $e) {
            // Handle Twilio verification-related errors
            return back()->withErrors(['error' => 'رقم غير صحيح , فشلت عملية الإرسال']);
        }
        
        RateLimiter::hit($rateLimitKey, $rateLimitDecayMinutes);

        if ($response = $this->registered($request,
         $user)) {
            return $response;
        }

        session([
            'name' => $request->name,
            'email' => $request->email,
            'phoneNum' => $request->dial_code,
            'password' => $request->password,
            'verification' => true
        ]);
        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect()->route('verify');
    }
}
