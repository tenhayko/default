<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckLoginAdmin
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
        print_r(Auth::guest('admin'));
         if (Auth::guest('admin')) {
            return $next($request);
        }else{
            echo "ko vao dc";
        }
        die('ok');
        // if (Auth::check()) {
        //     $user = Auth::user();
        //     if ($user->id ==100)
        //        return $next($request);
        //     else
        //         return redirect()->route('loginAdmin');
        // }else{
        //     return redirect()->route('loginAdmin');
        // }
        // return $next($request);
    }
}
