<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\WorkWithProudacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AddProudactController extends Controller
{


public function Add(Request $request)
{
    // dd($request->all());
    $data = $request->all();

    // بررسی و آپلود عکس
    if($request->hasFile('images')) {
        $file = $request->file('images'); // تک عکس
        $path = $file->store('products', 'public'); // ذخیره در storage/app/public/products
        $data['photos'] = $path; // مسیر عکس در دیتابیس ذخیره می‌شود
    }

    $extra = json_encode($request->extra);


    // ذخیره محصول
    WorkWithProudacts::AddProudact($data, $extra);

    return back();
}

}
