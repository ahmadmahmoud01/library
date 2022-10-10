<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class UserAuth
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
        // Check Method To Check If Session Store User Or Not
        if ( Auth::check() ) { //This Means There Is Login Process

            return $next($request);

        }

        return redirect( route('login') );
    }
}
