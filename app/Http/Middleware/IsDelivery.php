<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsDelivery
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
        if (Auth::user() == ! null) {
            if (Auth::user()->is_delivery == 1) {
                return $next($request);
            }
        }
        
        return redirect('dashboard/orders');
    }
}
