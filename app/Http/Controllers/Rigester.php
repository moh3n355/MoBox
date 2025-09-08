<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Rigester extends Controller
{
    public function CreateVerifyCode(){
    $randomNumber = mt_rand(10000, 99999);
    route('auth.dynamic', ['type' => 'register', 'VerifyCode' => "$randomNumber"]);
    }

}
