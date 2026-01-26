<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
        'meta_data',
        'data',
        'color',
        'amount',
        'off',
        'type',
    ];

    // cast کردن JSONها
    protected $casts = [
        'data' => 'array',
        'meta_data' => 'array',
    ];
}
