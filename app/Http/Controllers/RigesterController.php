<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Models\PutData;

class RigesterController extends Controller
{
    public function PutData($request){

        $putData = new PutData();
  
        try {
            PutData::AddNweUser( $request->input('set-username'), session()->get('phone')
            , bcrypt($request->input('set-password')));

            return redirect()->route('auth.dynamic', ['type' => 'login'])
                 ->with([
                     'success' => 'ثبت نام با موفقیت انجام شد!'
                ]);


        } 
        catch (QueryException $e) {
            // بررسی خطای یونیک بودن
            // کد خطای MySQL برای Duplicate entry
            if ($e->errorInfo[1] == 1062) { 
                return redirect()->back()->withErrors(['set-username' => 'نام کاربری قبلا ثبت شده است']);
            }

            // سایر خطاها
            dd($e);
        }

    }
}