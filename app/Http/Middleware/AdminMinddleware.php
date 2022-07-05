<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AdminMinddleware
{
    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->isAdmin()){
            return $next($request);
        }
        return abort(403);
    }
}
