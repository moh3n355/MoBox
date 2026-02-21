<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function check(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = User::where('username', $username)->first();

        if ($user && Hash::check($password, $user->userpassword)) {
            Auth::login($user);

            if ($request->filled('intended')) {
                session(['url.intended' => $request->input('intended')]);
            }

            return redirect()->intended(route('home'));
        }
        return back()->withErrors(['password' => 'رمز یا نام کاربری اشتباه است']);
    }
}
