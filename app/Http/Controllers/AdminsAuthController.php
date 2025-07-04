<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminsAuthController extends Controller
{
    // check login
    protected function CheckLogin(){
        if(Auth::guard('admins')->check()){
            return redirect()->to('admins/dashboard')->send();
        }
    }
    public function __construct(){
        $this->CheckLogin();
      
    }
    // Login
    public function Login(){
        return view('admins.login');
    } 
}
