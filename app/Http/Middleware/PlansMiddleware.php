<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PlansMiddleware
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
        if(auth()->user()->plan == null || empty(auth()->user()->plan)){
            return redirect()->route('user.plans')->with('error', 'Please choose a plan to continue investing');
        }else{
            return $next($request);
        }
        
    }
}
