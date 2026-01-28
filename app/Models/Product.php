<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

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

    public function cartUsers()
    {
    return $this->belongsToMany(User::class, 'cart_items')
                ->withPivot('quantity')
                ->withTimestamps();
    }
}
