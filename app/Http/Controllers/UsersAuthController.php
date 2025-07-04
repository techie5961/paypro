<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UsersAuthController extends Controller
{ 
    //  Check login
    protected function CheckLogin(){
        if(Auth::guard('users')->check()){
            return redirect()->to('users/dashboard')->send();

        }
    } 
    
    public function __construct()
    {
        $this->CheckLogin();
      
    }
    // register
    public function Register(){
        if(request()->has('ref')){
            $user=DB::table('users')->where('username',request()->input('ref'))->count();
            if($user == 0){
                
             return view('users.auth.register');
            }
             else{
               
                return view('users.auth.register',[
                    'ref' => request()->input('ref')
                ]);
             }
        }
        return view('users.auth.register');
    }
    public function Login(){
        return view('users.auth.login');
    }
    // forgot password
    public function Forgot(){
        return view('users.auth.forgot.validate');
    }
    // forgot password otp
    public function ForgotOTP(){
       if(!request()->has('email')){
     return redirect()->to('forgot');
       }
       
        return view('users.auth.forgot.otp',[
            'email' => request()->input('email')
        ]);
    }
    // reset password
    public function ResetPassword(){
        if(!request()->has('otp') || !request()->has('email')){
             return redirect()->to('forgot');
        }
        if(DB::table('otp')->where('email',request()->input('email'))->where('otp',request()->input('otp'))->count() == 0){
             return redirect()->to('forgot');
        }
        return view('users.auth.forgot.reset',[
            'otp' => request()->input('otp'),
            'email' => request()->input('email')
        ]);
    }
}
