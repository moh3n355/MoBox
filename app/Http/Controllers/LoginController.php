<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    Public function check($request){
        $UserNameInputed = $request->input('username');
        $UserPassInputed = $request->input('password');

        $user = new User();
        
        $user = User::where('username', $UserNameInputed)->first();

        if($user && /*Hash::check(*/$UserPassInputed == $user->userpassword)/*)*/{
            auth::login($user);
            return redirect()->route('home');
        }
        else{
            return back()->withErrors(['password' => 'رمز یا نام کاربری اشتباه است']);  
        }
    }
}