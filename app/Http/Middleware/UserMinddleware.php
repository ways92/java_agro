<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class UserMinddleware
{

     public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->isUser()){
            return $next($request);
        }
        return abort(403);
    }
}
