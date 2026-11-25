<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // A per-IP limit alone lets someone rotate addresses to keep mailing
        // one inbox, so reset requests are capped per address as well. The
        // password broker's own one-a-minute throttle still applies.
        RateLimiter::for('forgot-password', function (Request $request) {
            $email = Str::lower(trim((string) $request->input('email')));

            return array_filter([
                Limit::perMinute(5)->by('forgot-password:ip:'.$request->ip()),
                $email === '' ? null : Limit::perHour(5)->by('forgot-password:email:'.$email),
            ]);
        });
    }
}
