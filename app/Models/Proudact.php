<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proudact extends Model
{
    protected $table = 'products';

    // فیلدهایی که می‌خوای با mass assignment پر بشن
    protected $fillable = [
    'name',
    'color',
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
        return self::create([
            'name' => $data['name'],
            'color'=> $data['color'],
            'brand' => $data['brand'],
            'quantity' => $data['quantity'],
            'price' => $data['price'],
            'discount' => $data['discount'],
            'categoery' => $data['categoery'],
            'photos' => $data['photos'], 
            'informations' => $extra,
        ]);
    }
    public function scopeFilter($query, $filters)
    {

        if(!empty($filters['search'])){
        $query->where('name', 'like', '%'.$filters['search'].'%');
        }
        
        // برند
        if(!empty($filters['brand'])){
            $query->whereIn('brand', $filters['brand']);
        }

        if(!empty($filters['category']) && $filters['category'] !== 'empty'){
            $categories = is_array($filters['category']) ? $filters['category'] : [$filters['category']];
            $query->whereIn('category', $categories);
        }
        
        // رنگ
        if(!empty($filters['color'])){
            $query->whereIn('color', $filters['color']);
        }

        // فقط موجود
        if(!empty($filters['available'])){
            $query->where('quntity', '>',0);
        }

        // فقط تخفیف دار
        if(!empty($filters['discount'])){
            $query->where('discount','>',0);
        }

        // پردازنده (cpu) از JSON
        if(!empty($filters['cpu'])){
            $query->whereIn('informations->پردازنده', $filters['cpu']);
        }

        // پردازنده گرافیکی (gpu) از JSON
        if(!empty($filters['gpu'])){
            $query->whereIn('informations->پردازنده گرافیکی', $filters['gpu']);
        }

        // حافظه
        if(!empty($filters['storage'])){
            $query->whereIn('informations->حافظه', $filters['storage']);
        }

        // رم
        if(!empty($filters['ram'])){
            $query->whereIn('informations->رم', $filters['ram']);
        }

        // نمایشگر
        if(!empty($filters['display'])){
            $query->whereIn('informations->صفحه نمایش', $filters['display']);
        }

        // باتری
        if(!empty($filters['battery'])){
            $query->whereIn('informations->باتری', $filters['battery']);
        }

        // توان شارژ
        if(!empty($filters['charging'])){
            $query->whereIn('informations->توان شارژ', $filters['charging']);
        }

        // مرتب‌سازی
        if(!empty($filters['sort'])){
            switch($filters['sort']){
                case 'newest':
                    $query->orderBy('created_at','desc');
                    break;
                case 'oldest':
                    $query->orderBy('created_at','asc');
                    break;
                case 'price_asc':
                    $query->orderBy('price','asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price','desc');
                    break;
                case 'most_discount':
                    $query->orderBy('discount','desc');
                    break;
            }
        } else {
            $query->orderBy('created_at','desc'); // پیشفرض
        }
        dd($query->get()->toArray());
 
        return $query;

    }
}
