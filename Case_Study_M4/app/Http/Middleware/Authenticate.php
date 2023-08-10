<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
 protected function redirectTo($request)
{
    if (!$request->expectsJson() && $request->is('shop/*')) {
        return route('login');
    }

    return route('login');
}

}
