<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RigesterController;
use App\Http\Controllers\ForgotController;
use App\Http\Controllers\SendVerifyCode;

Route::get('/', function () {
        return view(view: 'home');
    })->name('home');

Route::get('/auth/{type}', function ($type) {
    $allowed = [
        'login'    => 'login',
        'register' => 'register',
        'forgot'   => 'forgot',
        'verify'   => 'verify',
        'set-username-password'=> 'set-username-password',
        'show-password' => 'show-password',
    ];

    if (! array_key_exists($type, $allowed)) {
        abort(404);
    }

    return view('auth.auth', ['type' => $type]);
})->name('auth.dynamic');

Route::get('/auth', function () {
    return view('auth.auth');
})->name('auth');

Route::get('/ResumeAuth/{type}', function ($type) {
    $allowed = [
        'login'    => 'login',
        'register' => 'register',
        'forgot'   => 'forgot',
        'verify'   => 'verify',
    ];

    if (! array_key_exists($type, $allowed)) {
        abort(404);
    }

    return view('auth.auth', ['type' => $type]);
})->name('auth.dynamic');    





Route::get('/ResumeAuth/{type}', function ($type) {

    if ($type == 'register') {
        if(!app(ForgotController::class)->CheckUserNumber(request())){
            session(['TypeForAfterVerify' => 'register',]);

            return app(SendVerifyCode::class)->CreateAndSendVerifyCode(request());
        }
        else{
            return back()->withErrors(['phone' => 'این شماره قبلا ثبت نام شده است']);
        }
    }
    else if ($type == 'forgot') {
        if(app(ForgotController::class)->CheckUserNumber(request())){
            session(['TypeForAfterVerify' => 'forgot',]);

            return app(SendVerifyCode::class)->CreateAndSendVerifyCode(request());

        }
        else{
            return back()->withErrors(['phone' => 'این شماره ثبت نام نشده']);
        }
    }
    else if($type == 'login') {
        return app(LoginController::class)->check(request());

    }
    else if($type == 'verify') {
        return app(SendVerifyCode::class)->VerifyCode(request());
    }
    else if($type == 'set-username-password') {
        return app(RigesterController::class)->PutData(request());
    }
    else{
        abort(404);
    }
})->name('ResumeAuth');



