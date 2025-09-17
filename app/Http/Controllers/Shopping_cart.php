<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Shopping_cart extends Controller
{
    public function add(){
       
    }

    public function Recive(Request $request){
         $cartItems = auth()->user()->cartItems()->with('product')->get();
        
        return view('display-shopping-cart', compact('cartItems'));
    }
}
