<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class GuestController extends Controller
{
    public function index()
    {
        return view('index');
    }


    public function terms()
    {
        return view('terms');
    }

    public function faq()
    {
        return view('faq');
    }


    public function contact(Request $request)
    {

        $this->validate($request, [
            'name' => ['bail', 'required', 'string', 'max:60'],
            'email' => ['bail','required', 'email','max:60'],
            'subject' => ['bail','required', 'string','max:60'],
            'msg' => ['bail','required', 'string','max:500'],
        ]);
     

        // Create a new contact form entry
        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'msg' => $request->msg,

        ]);

        if($contact){
            alert()->success('تم الإرسال بنجاح')->showConfirmButton('حسناً');
            return redirect()->route('welcome');

        }else{
            alert()->error('فشلت عملية الإرسال')->showConfirmButton('حسناً');
            return redirect()->back();

        }
    }
    
}
