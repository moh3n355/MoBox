<?php

use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\ReciveDataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RigesterController;
use App\Http\Controllers\ForgotController;
use App\Http\Controllers\SendVerifyCode;

// روت home بیرون از گروه
Route::get('/', function () {
    return view(view: 'home');
})->name('home');

// بقیه روت‌ها داخل گروه با prefix /auth
Route::group(['prefix' => 'auth'], function () {

    Route::get('/{type}', function ($type) {
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

    Route::get('/', function () {
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

});


Route::get('/shopping-cart', function () {
    return view(view: 'shopping-cart');
})->name('shopping-cart');


Route::get('/edit-profile', [ReciveDataController::class, 'ReciveAddresses']
)->name('edit-profile');


Route::get('/verify/edit-profile', [EditProfileController::class, 'EditCreditional']
)->name('verify-edit-profile');

Route::get('/edit-phone', function () {
    session(['ForRedirectrAfterVerify' => 'edit-phone',]);

    return redirect()->route('auth.dynamic', ['type' => 'register']);
})->name('edit-phone');


Route::get('/ticket', action: function () {
    return view(view: 'ticket');
})->name('ticket');

Route::get('/exit', function () {
    Auth::logout();
    return view(view: 'home');
})->name('exit');


Route::get('/add-address', function () {
    return view(view: 'address');
})->name('add-address');

Route::POST('/verify/address', [EditProfileController::class, 'UpdateAddress']
)->name('verify-addresa');

Route::get('/delete/address/{index}', [EditProfileController::class,'DeleteAddress'])
    ->name('DeleteAddress');



