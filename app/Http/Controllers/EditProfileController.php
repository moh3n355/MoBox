<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PutData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Throwable;
use User;

class EditProfileController extends Controller
{   

    public function ConnectToModels($usrename){
        //try{
            $user = User::where('username', $usrename)->first();
            $putData = new PutData();
        // }
        // catch(Throwable $e){
        //     return back()->withErrors("NwePassword", "در حال حاضر این امکان وجود ندارد");

        // }
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
        elseif($request->input("NwePassword") !== $user->userpassword){
            if(Hash::check($request->input("OldPassword"), $user->userpassword)){
                $putData->userpassword = $request->input("NwePassword");
                return back()->withErrors("NwePassword", "رمز شما با موفقیت ثبت شد");
            }
            else{
                return back()->withErrors("OldPassword", "رمز عبور اشتباه است");
            }    
        }
        else{
            return back()->withErrors("NwePassword", "چیزی برای تغیر دادن وجود ندارد");
        }
    }

    public function UpdatePhone(Request $request){
        [$user, $putData] = $this->ConnectToModels($request->input("username"));
        
        $putData->phone = $request->input("phone");

        return redirect()->route('edit-profile')
                 ->withErrors(['NwePassword' => 'شماره با موفقیت تقیر کرد']);
    }
}

