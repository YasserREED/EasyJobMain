<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string','max:255'],
        ]);

        if(auth()->guard('manager')->attempt(['email' => $request->input('email'),  'password' => $request->input('password')])){
            $user = auth()->guard('manager')->user();
                return redirect()->route('managerHome');
            
        }else {
            return back()->withErrors("فشلت عملية تسجيل الدخول");
        }
    }

    public function ManagerLogout(Request $request)
    {
        auth()->guard('manager')->logout();
        Session::flush();
        Session::put('success', 'You are logout sucessfully');
        return redirect(route('ManagerLogin'));
    }
}
