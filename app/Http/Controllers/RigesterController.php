<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Models\PutData;
use Illuminate\Http\Request;

class RigesterController extends Controller
{
    public function PutData($request){

        $putData = new PutData();
  
        try {
            PutData::create([
                'username' => $request->input('set-username'),
                'phone' => session()->get('phone'),
                'userpassword' => bcrypt($request->input('set-password')),
                'role' => 'user'
            ]);

            return redirect()->route('auth.dynamic', ['type' => 'login'])
                 ->withErrors([
                     'password' => 'ثبت نام با موفقیت انجام شد!'
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