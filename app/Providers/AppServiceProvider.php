<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * The public forms that are limited per IP, named after their config key.
     *
     * @var list<string>
     */
    private const THROTTLED = ['login', 'register', 'contact'];

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
        foreach (self::THROTTLED as $bucket) {
            RateLimiter::for($bucket, function (Request $request) use ($bucket) {
                return Limit::perMinute(config("security.throttle.{$bucket}"))
                    ->by("{$bucket}:{$request->ip()}");
            });
        }
    }
}
