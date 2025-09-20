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
        
        if($request->input("fullName") !== $user->fullName){
            $user->fullName = $request->input("fullName");
            $user->save();
        }
        if($request->input("username") !== $user->username){
            $user->username = $request->input("username");
            $user->save();
        }
        if($request->input("email") !== $user->email){
            $user->email = $request->input("email");
            $user->save();
        }
        if($request->input("address") !== $user->address){
            $user->address = $request->input("address");
            $user->save();
        }
        if($request->input("NwePassword") !== $user->userpassword){

            if(Hash::check($request->input("OldPassword"), $user->userpassword)){
                $user->userpassword = bcrypt($request->input("NwePassword"));
                $user->save();  
            }
            else{
                return back()->withErrors(['OldPassword' => 'رمز عبور اشتباه است']);
            }    
        }
        else{
            return back()->withErrors(["NwePassword" => "چیزی برای تغیر دادن وجود ندارد"]);
        }

        return back()->withErrors(["NwePassword"=> "تقیرات با موفقیت ذخیره شد"]);

    }

    public function UpdatePhone(Request $request){
        $user = $this->ConnectToModels();
        
        $user->phone = session()->get('phone');
        $user->save();

        return redirect()->route('edit-profile')
                 ->with(['phonestatus' => 'شماره با موفقیت تقیر کرد']);
    }

    public function UpdateAddress(Request $request)
    {
        $user = $this->ConnectToModels();

        $addresses = json_decode($user->address, true);

        // dd($addresses);
        $newAddress = [
            'city'        => $request->input('city'),
            'street'      => $request->input('street'),
            'alley'       => $request->input('alley'),
            'plaque'      => $request->input('plaque'),
            'floor'       => $request->input('floor'),
            'describtion' => $request->input('describtion'),
        ];

        $added = false;
        for($i = 0; $i < 3; $i++){
            if(empty($addresses[$i])){
                $addresses[$i] = $newAddress;
                $added = true;
                break;
            }
        }

        if(!$added){
            return redirect()->route('edit-profile')
            ->with('addressstatus', 'نمی‌توانید بیشتر از ۳ آدرس اضافه کنید.');
        }

        $user->address = $addresses;
        $user->save();

        return redirect()->route('edit-profile')
        ->with('addressstatus', 'آدرس با موفقیت تغییر کرد.');
    }

    public function DeleteAddress($index){
        $user = $this->ConnectToModels();

        $user->address[$index] = null;
        return redirect()->route('edit-profile');
    }
}

