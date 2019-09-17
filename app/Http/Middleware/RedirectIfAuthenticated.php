<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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
<<<<<<< HEAD
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }

=======
        if ($guard == "admin" && Auth::guard($guard)->check()) {
            return redirect('/admin');
        }
        if ($guard == "teacher" && Auth::guard($guard)->check()) {
            return redirect('/teacher');
        }
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }
>>>>>>> 49a2da52f01bfe480968e3127d13be8a72d8e06d
        return $next($request);
    }
}
