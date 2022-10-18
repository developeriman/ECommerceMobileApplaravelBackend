<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
     public function userLoginForm()
    {
        if(Auth::check()){
            return redirect()->back()->with('warning','PLEASE LOGOUT FIRST TO LOGIN');
        }else{
            return view('frontend.user-login');
        }
    }
}
