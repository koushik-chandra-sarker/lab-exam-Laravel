<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserLoginCheckMiddleware
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

        if (!session()->has('user_id')) {
            return redirect(url('/user-login'));
        }
        return $next($request);
    }
}
