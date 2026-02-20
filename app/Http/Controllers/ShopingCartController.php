<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class ShopingCartController extends Controller
{
    public function add(Request $request)
    {
        $user = auth()->user();
        $productId = $request->input('product_id');

        $product = Product::find($productId);
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'محصول یافت نشد'
            ], 404);
        }

        // رکورد سبد
        $existing = DB::table('cart_items')
            ->where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();

        $currentQty = $existing ? $existing->quantity : 0;

        //  چک موجودی
        if ($currentQty >= $product->amount) {
            return response()->json([
                'success' => false,
                'message' => 'موجودی این محصول به حداکثر رسیده'
            ]);
        }

        if ($existing) {
            DB::table('cart_items')
                ->where('user_id', $user->id)
                ->where('product_id', $productId)
                ->update([
                    'quantity' => DB::raw('quantity + 1'),
                    'updated_at' => now()
                ]);
        } else {
            $user->cartProducts()->attach($productId, [
                'quantity' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'محصول به سبد خرید اضافه شد',
            'cart_count' => $user->cartProducts()->sum('cart_items.quantity')
        ]);
    }
        public function remove($productId)
    {
        $user = auth()->user();

        // بررسی وجود محصول در سبد کاربر
        $existing = $user->cartProducts()
                        ->where('product_id', $productId)
                        ->first();

        if (!$existing) {
            return response()->json([
                'success' => false,
                'message' => 'محصول در سبد خرید یافت نشد'
            ], 404);
        }

        $currentQuantity = $existing->pivot->quantity;

        if ($currentQuantity > 1) {
            // کاهش quantity
            DB::table('cart_items')
                ->where('user_id', $user->id)
                ->where('product_id', $productId)
                ->update([
                    'quantity' => DB::raw('quantity - 1'),
                    'updated_at' => now()
                ]);

            $message = 'تعداد محصول کاهش یافت';
        } else {
            // حذف کامل محصول از سبد
            $user->cartProducts()->detach($productId);
            $message = 'محصول از سبد خرید حذف شد';
        }

        return response()->json([
            'success' => true,
            'message' => $message,
            'cart_count' => $user->cartProducts()->count()
        ]);
    }

    public function BelongToUser($UserId = null)
    {
        $currentUser = auth()->user();

        // اگر UserId داده نشده، از کاربر فعلی استفاده کن
        if ($UserId === null) {
            $userId = $currentUser->id;
            $targetUser = $currentUser;
        } else {
            $userId = $UserId;
            $targetUser = \App\Models\User::find($userId);

            // بررسی وجود کاربر
            if (!$targetUser) {
                return response()->json([
                    'success' => false,
                    'message' => 'کاربر مورد نظر یافت نشد'
                ], 404);
            }
        }

        // بررسی دسترسی (اگر می‌خواهد کاربر دیگری را ببیند)
        if ($userId != $currentUser->id && !$currentUser->is_admin) {
            return response()->json([
                'success' => false,
                'message' => 'دسترسی غیرمجاز. فقط ادمین می‌تواند سبد خرید دیگران را مشاهده کند'
            ], 403);
        }

        // دریافت آیتم‌های سبد خرید
        $cartItems = $targetUser->cartProducts()
            ->withPivot('quantity')
            ->get();

            // محاسبه جمع کل
        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item->price * $item->pivot->quantity;
        }

        return response()->json([
            'success' => true,
            'user_id' => $userId,
            'user_name' => $targetUser->name,
            'cart_items' => $cartItems,
            'total' => $total,
            'item_count' => $cartItems->count(),
            'is_current_user' => ($userId == $currentUser->id)
        ]);
    }
}
