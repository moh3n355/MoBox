<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditProfileRequest;
use App\Models\PutData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Throwable;
use App\Models\User;



class EditProfileController extends Controller
{   

    public function ConnectToModels(){
        try{
            $user = User::where('id', auth()->id())->first();            
            return $user;
        }
        catch(Throwable $e){
            return back()->withErrors("NwePassword", "در حال حاضر این امکان وجود ندارد");

        }
    }

    public function EditCreditional(EditProfileRequest $request){

        $user= $this->ConnectToModels();
        
        if($request->input("fullName") !== $user->username){
            $user->username = $request->input("fullName");
            $user->save();

            return back()->withErrors("FullName", "نام شما با موفقیت ثبت شد");
        }
        elseif($request->input("email") !== $user->eamil){
            $user->email = $request->input("email");
            $user->save();

            return back()->withErrors("FullName", "ایمیل شما با موفقیت ثبت شد");
        }
        elseif($request->input("address") !== $user->address){
            $user->address = $request->input("address");
            $user->save();

            return back()->withErrors("address", "آدرس شما با موفقیت ثبت شد");
        }
        elseif($request->input("NwePassword") !== $user->userpassword){
            if(Hash::check($request->input("OldPassword"), $user->userpassword)){

                $user->userpassword = $request->input("NwePassword");
                $user->save();

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
        $user = $this->ConnectToModels();
        
        $user->phone = session()->get('phone');
        $user->save();

        return redirect()->route('edit-profile')
                 ->withErrors(['NwePassword' => 'شماره با موفقیت تقیر کرد']);
    }
}

