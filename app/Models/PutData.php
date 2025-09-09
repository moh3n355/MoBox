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
}
