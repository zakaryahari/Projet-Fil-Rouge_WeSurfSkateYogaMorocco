<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PreventAdminAccess
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return $next($request);
    }
}
