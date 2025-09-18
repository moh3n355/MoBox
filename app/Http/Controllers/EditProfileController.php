<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PutData;
use Illuminate\Http\Request;
use Throwable;
use User;

class EditProfileController extends Controller
{   

    public function ConnectToModels($usrename){
        try{
            $user = User::where('username', $usrename)->first();
            $putData = new PutData();
        }
        catch(Throwable $e){
            return back()->withErrors("userpassword", "در حال حاضر این امکان وجود ندارد");

        }
    }

    public function EditCreditional(Request $request){

        [$user, $putData] = $this->ConnectToModels($request->input('username'));

        if($request->input("fullName") !== $user->username){
            $putData->username = $request->input("fullName");

            return back()->withErrors("FullName", "نام شما با موفقیت ثبت شد");
        }
        elseif($request->input("address") !== $user->address){
            $putData->address = $request->input("address");

            return back()->withErrors("address", "آدرس شما با موفقیت ثبت شد");
        }
        elseif($request->input("userpassword") !== $user->userpassword){
            $putData->userpassword = $request->input("userpassword");

            return back()->withErrors("userpassword", "رمز شما با موفقیت ثبت شد");    
        }
        else{
            return back()->withErrors("userpassword", "چیزی برای تغیر دادن وجود ندارد");
        }
    }

    public function EditNumber(Request $request){  
        
        [$user, $putData] = $this->ConnectToModels($request->input('username'));

        if($request->input("phone") !== $user->phone){
            $putData->username = $request->input("fullName");

            return back()->withErrors("FullName", "تلفن شما با موفقیت ثبت شد");
        }
        else{
            return back()->withErrors("userpassword", "چیزی برای تقییر نیست");
        }
    }
}
