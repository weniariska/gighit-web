<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthUser
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
                if(Auth::user()->userType === 'customer') // klo auth customer
                {
                    return $next($request);
                }
                else { // klo auth admin
                    return redirect()->to('/admin-order');
                }
            }
        }

        // klo guest
        return redirect()->to('/notsign');
    }
}
