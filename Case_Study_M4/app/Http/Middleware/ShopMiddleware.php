<?php

namespace App\Http\Middleware;

use Closure;

class ShopMiddleware
{
    public function handle($request, Closure $next)
{
    if (Auth::guard('shop')->check()) {
        // User is authenticated as a shop user
        return $next($request);
    }

    // User is not authenticated as a shop user
    return redirect()->route('shop.login')->with('message', 'Please log in to access the shop.');
}

}
