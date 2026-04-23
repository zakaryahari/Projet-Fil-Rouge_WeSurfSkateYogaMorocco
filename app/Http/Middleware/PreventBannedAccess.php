<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PreventBannedAccess
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->is_banned) {
            return redirect('/')->with('error', 'Your account has been banned. You cannot book.');
        }

        return $next($request);
    }
}
