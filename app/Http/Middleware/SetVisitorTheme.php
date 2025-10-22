<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetVisitorTheme
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $theme = session('visitor_theme', config('themes.default_theme'));

        $available = config('themes.available');

        // fallback if invalid theme in session
        if (!array_key_exists($theme, $available)) {
            $theme = config('themes.default_theme');
        }

        view()->share('visitorTheme', $theme);

        app('view')->getFinder()->prependLocation(
            $available[$theme]['view_path']
        );


        return $next($request);
    }
}
