<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function filter(Request $request)
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

        return $query->get();
    }

    public function search(Request $request)
    {
        $search = $request->input('search', null);
        $type   = $request->input('type', null); // فیلتر type

        $query = Product::query();

        if (empty($search)) {
            return response()->json(['data' => [], 'message' => 'Nothing to search']);
        }

        
        // فیلتر type اگر ارسال شده
        if (!empty($type)) {
            $query->where('type', $type);
        };

        $query = Product::query();

        if(!empty($search)){
        $tokens = preg_split('/\s+/', $search, -1, PREG_SPLIT_NO_EMPTY);



        // ساخت ستون rank مجازی با CASE WHEN
        $rankSqlParts = [];
        foreach ($tokens as $i => $token) {
            $token = trim($token);
            if (!$token) continue;

            // وزن بیشتر برای match در name
            $rankSqlParts[] = "CASE WHEN name LIKE '%{$token}%' THEN ".(count($tokens) - $i)." ELSE 0 END";

            // وزن کمتر برای match در data
            $rankSqlParts[] = "CASE WHEN data LIKE '%{$token}%' THEN ".(count($tokens) - $i)/2 ." ELSE 0 END";
        }

        $rankSql = implode(' + ', $rankSqlParts);

        $query->selectRaw("*, ($rankSql) as rank")
              ->orderByDesc('rank');
        }

        $products = $query->get();

        return response()->json($products);
    }

   public function getById(Request $request)
    {
        $ids = $request->input('id');

        if (!$ids) {
            return []; // فقط آرایه خالی برگردان
        }

        // اگر عدد یا رشته منفرد است → تبدیل به آرایه
        if (!is_array($ids)) {
            if (is_string($ids)) {
                $ids = explode(',', $ids);
            } else {
                $ids = [$ids];
            }
        }

        $ids = array_map('intval', $ids);

        $products = Product::whereIn('id', $ids)->get();

        return $products; // collection برگردان
    }
}


