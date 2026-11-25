<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ActiveAccountMiddleware
{
    /**
     * Handle an incoming request.
     *
     * An admin can deactivate an account while its owner is still signed in.
     * The session is only checked on sign-in, so without this the deactivated
     * user would keep browsing the admin area until they logged out.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if ($user !== null && ! $user->user_status) {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()
                ->route('login')
                ->withErrors(['error' => 'Your account has been deactivated.']);
        }

        return $next($request);
    }
}
