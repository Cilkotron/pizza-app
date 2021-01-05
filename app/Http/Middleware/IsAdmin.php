<?php

namespace App\Http\Middleware;

use Closure;

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
        $allowed = [
            'admin',
            'full'
        ];
        if(in_array(auth()->user()->roles, $allowed)) {
            return $next($request);
        } else {
            return abort('401');
        }


    }
}
