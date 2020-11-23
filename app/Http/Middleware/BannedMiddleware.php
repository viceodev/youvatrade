<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BannedMiddleware
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
        if(auth()->user()->banned == true){
            return redirect()->route('index')->with('error', 'Your account has been banned, please contact our support team via Support@youvatrade.com');
        }else{
            return $next($request);
        }
        
    }
}
