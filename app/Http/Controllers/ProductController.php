<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; // اضافه شد
use App\Http\Controllers\ProductController;

class ProductController extends Controller
{
    public function index(Request $request)
{
    $data = $request->input('filters', []); // اینجا تمام آرایه فرستاده شده رو میگیریم
    $query = Product::query();

    // فیلتر نوع محصول
    if (!empty($data['type'])) {
        $query->where('type', $data['type']);
    }

    // فقط موجودی
    if (!empty($data['available'])) {
        $query->where('amount', '>', 0);
    }

    // قیمت
    if (!empty($data['min_price'])) {
        $query->where('price', '>=', $data['min_price']);
    }

    if (!empty($data['max_price'])) {
        $query->where('price', '<=', $data['max_price']);
    }

    // فیلتر داینامیک JSON
    if (!empty($data['filters'])) {
        foreach ($data['filters'] as $key => $value) {
            if (is_array($value)) {
                $query->where(function($q) use ($key, $value) {
                    foreach ($value as $item) {
                        $q->orWhereJsonContains("data->$key", $item);
                    }
                });
            } else {
                $query->whereJsonContains("data->$key", $value);
            }
        }
    }

    // مرتب‌سازی
    switch ($data['sort'] ?? '') {
        case 'newest':
            $query->latest('created_at'); break;
        case 'cheapest':
            $query->orderBy('price','asc'); break;
        case 'expensive':
            $query->orderBy('price','desc'); break;
        default:
            $query->latest('created_at');
    }

    return $query->paginate(12);
}
}



Route::post('/productsfilter', [ProductController::class, 'index']);