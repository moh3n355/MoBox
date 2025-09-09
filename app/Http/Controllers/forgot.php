<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class forgot extends Controller
{   
    public function CheckUserNumber($request){
        if(User::where('phone', $request->input('phone'))->exists()){
            return true;
        }
        else{
            return false;
        }
    }

    public function CreatePassword($request){

    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $password = '';

    for ($i = 0; $i <8; $i++) {
        $NwePassword .= $characters[rand(0, strlen($characters) - 1)];
    }

    $user = User::where('phone', $request->input('phone'))->first();
    $user->userpassword = bcrypt($NwePassword);
    return redirect()->route('')->with('NwePassword', $NwePassword);
    }
}
