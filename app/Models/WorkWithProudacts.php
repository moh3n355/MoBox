<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkWithProudacts extends Model
{
    protected $table = 'products';

    // فیلدهایی که می‌خوای با mass assignment پر بشن
    protected $fillable = [
    'name',
    'brand',
    'quantity',
    'views',
    'discount',
    'categoery',
    'price',
    'photos',
    'informations',
    ];  


     public static function AddProudact(array $data, $extra){
        // dd($extra);
    return self::create([
        'name' => $data['name'],
        'brand' => $data['brand'],
        'quantity' => $data['quantity'],
        'price' => $data['price'],
        'discount' => $data['discount'],
        'categoery' => $data['categoery'],
        'photos' => $data['photos'], 
        'informations' => $extra,
    ]);
}

}
