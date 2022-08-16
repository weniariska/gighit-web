<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) { //klo udh auth
                if(Auth::user()->userType === 'admin') // klo auth admin
                {
                    return redirect()->to('/admin-order');
                }
                else { // klo bukan admin
                    return $next($request);
                }
            }
        }

        return $next($request);
    }
}
