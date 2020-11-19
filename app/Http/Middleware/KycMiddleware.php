<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class KycMiddleware
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

        if(auth()->user()->status != 'verified'){
            return redirect()->route('user.kyc.init')->with('error', 'You have to complete your kyc to continue investing');
        }else{
            return $next($request);
        }
    }
}
