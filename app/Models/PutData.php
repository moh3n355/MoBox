<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PutData extends Model
{
    // مشخص کردن جدول مورد نظر
    protected $table = 'users';

    // فیلدهایی که می‌خوای با mass assignment پر بشن
    protected $fillable = [
        'username',
        'phone',
        'userpassword',
    ];

     public static function AddNweUser($username, $phone, $userpassword){
        return self::create([
                'username' => $username,
                'phone' => $phone,
                'userpassword' => $userpassword, // هش کردن پسورد
            ]);
    }

}
