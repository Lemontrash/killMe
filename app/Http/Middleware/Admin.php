<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//    dd(!Auth::check());
        if (!Auth::check()){
            return back();
        }
        else if (Auth::user()->role == 'admin'){
            return $next($request);
        }
        return back();
    }
}
