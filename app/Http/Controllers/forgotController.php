<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class forgotController extends Controller
{   
    public function CheckUserNumber($request){
        if(User::where('phone', $request->input('phone'))->exists()){
            return true;
        }
        else{
            return false;
        }
    }

    public function CreateAndUpdatePassword($request){
    $lower = 'abcdefghijklmnopqrstuvwxyz';
    $upper = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $digits = '0123456789';
    $special = '@';

    // حداقل یک کاراکتر از هر دسته
    $NwePassword = [];
    $NwePassword[] = $lower[rand(0, strlen($lower) - 1)];
    $NwePassword[] = $upper[rand(0, strlen($upper) - 1)];
    $NwePassword[] = $digits[rand(0, strlen($digits) - 1)];
    $NwePassword[] = $special[rand(0, strlen($special) - 1)];

    // بقیه کاراکترها را از همه دسته‌ها به صورت تصادفی انتخاب کن
    $all = $lower . $upper . $digits . $special;
    for ($i = 4; $i < 8; $i++) {
        $NwePassword[] = $all[rand(0, strlen($all) - 1)];
    }

    // مخلوط کردن پسورد
    shuffle($NwePassword);

    // تبدیل آرایه به رشته
    $NwePassword = implode('', $NwePassword);

    $user = User::where('phone', session('phone'))->first();
    $user->userpassword = bcrypt($NwePassword);
    $user->save();

    return redirect()->route('auth.dynamic', ['type' => 'show-password'])
    ->with('NwePassword',$NwePassword);
    }
}
