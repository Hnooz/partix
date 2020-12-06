<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        if (Auth::user() == !null) {
            if (Auth::user()->is_admin == 1) {
                return $next($request);
            }
        }
        
   
        return redirect('store')->with('error', "You don't have admin access.");
    }
}
