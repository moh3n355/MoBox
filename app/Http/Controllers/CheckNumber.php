<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CheckNumber extends Controller
{
    public function check(Request $request){
        function InnerCheck($request){
            if(User::where('phone', $request->input('phone'))->exists()){
                return true;
            }
            else{
                return false;
            }
        }

        if(InnerCheck($request)){
            if(session()->get('TypeForAfterVerify') == 'register'){
                return back()->withErrors(['phone' => 'این شماره قبلا ثبت نام شده است']);
            }
            else{
                return app(SendVerifyCode::class)->CreateAndSendVerifyCode(request());
            }
        }
        else{
            if(session()->get('TypeForAfterVerify') == 'register'){
                return app(SendVerifyCode::class)->CreateAndSendVerifyCode(request());
            }
            else{
                return back()->withErrors(['phone' => 'این شماره ثبت نام نشده']);
            }
        }
    }
}
