<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(Auth::user()->isAdmin()){
                return redirect('/admin/dashboard');

            }elseif(Auth::user()->isUser()){
                return redirect('/home');
            }
        }

        return $next($request);
    }
}
