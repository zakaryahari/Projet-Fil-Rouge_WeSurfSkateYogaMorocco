<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated AND banned
        if (Auth::check() && Auth::user()->is_banned) {
            // Log them out
            Auth::logout();

            // Invalidate the session
            $request->session()->invalidate();

            // Regenerate the CSRF token
            $request->session()->regenerateToken();

            // Redirect to login with error message
            return redirect()->route('login')->with('error', 'Your account has been banned. Please contact support.');
        }

        return $next($request);
    }
}
