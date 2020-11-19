<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->role != 'user' && auth()->user()->role != 'special'){
            return back()->with('error', 'You are not allowed to access that page');
        }else{
            return $next($request);
        }
    }
}
