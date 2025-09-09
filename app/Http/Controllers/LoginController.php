<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use User;

class LoginController extends Controller
{
    Public function check($request){
        $UserNameInputed = $request->input('username');
        $UserPassInputed = $request->input('password');

        $user = User::where('username', $UserNameInputed)->first();

        if($user->username == $UserNameInputed && $user->password == $UserPassInputed){
            auth::login($user);

            return redirect()->route('home');
        }
        else{
            return back()->witherrors('password','رمز یا نام کاربری اشتباه است');
        }
    }
}