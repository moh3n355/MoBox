<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * مسیرهایی که از بررسی CSRF مستثنی هستند.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/productsfilter',          // Route برای محصولات
        // '/orders/create',   // می‌توانید Routeهای دیگر را هم اضافه کنید
        // '/api/webhook',     // مثلا webhook های خارجی
    ];

    /**
     * توضیح: نیازی نیست کاری اضافه کنید.
     * این میدل‌ور به صورت خودکار روی بقیه Route ها CSRF را چک می‌کند.
     */
}
