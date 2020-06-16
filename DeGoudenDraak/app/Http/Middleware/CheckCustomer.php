<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckCustomer
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
        if (Auth::user() != null) {
            $userRoles = Auth::user()->roles->pluck('name');

            if ($userRoles->contains('Admin') || $userRoles->contains('Customer')) {
                return $next($request);
            } else {
                return redirect('/auth/unauthorized');
            }
        }
        else {
            return redirect('home');
        }
    }
}
