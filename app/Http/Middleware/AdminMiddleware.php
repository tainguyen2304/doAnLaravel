<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        if (!Auth::user()->role_as == '1') {
            return redirect('/home')->with('staus' . 'Access Denied. As you are not Admin');
        }
        return $next($request);
    }
}