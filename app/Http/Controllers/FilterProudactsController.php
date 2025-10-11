<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Proudact;
use Illuminate\Http\Request;

class FilterProudactsController extends Controller
{
    public function filter(Request $request, $categoery )
    {
        // همه فیلترها را می‌گیریم
        $filters = $request->all();
        $filters["categoery"] = $categoery;

        // اعمال scopeFilter مدل
        $products = Proudact::filter($filters)->get();

        // ارسال به Blade
        // return view('ِDisplayProudacts', compact('products'));
    }   
}
