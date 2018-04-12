<?php

namespace App\Http\Middleware;

use Closure;

class Perminssions
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
        // $name = \Request::route()->getName();
        // if ($name != 'admin') {
        //     abort(403, 'Unauthorized action.');
        // }
        return $next($request);
    }
}
