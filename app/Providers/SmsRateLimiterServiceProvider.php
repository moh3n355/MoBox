<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;

class SmsRateLimiterServiceProvider extends ServiceProvider
    {
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
    * Bootstrap services.
      */
    public function boot(): void
    {
        RateLimiter::for('verify-sms', function ($phone) {
            return [
                // حداکثر ۵ بار در هر ۱۰ دقیقه برای هر شماره تلفن
                Limit::perMinutes(10, 5)->by($phone)
            ];
        });
    }
}
