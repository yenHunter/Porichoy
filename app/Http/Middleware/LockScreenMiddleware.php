<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LockScreenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session('locked') && ! $request->is('lock') && ! $request->is('unlock')) {
            return redirect()->route('lock.screen');
        }

        return $next($request);
    }
}
