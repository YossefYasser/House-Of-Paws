<?php

namespace App\Http\Middleware\admin;

use Closure;
use Auth;
class AdminMiddleware
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
        if(Auth::user()->userType=="admin"){
            return $next($request);
        }else{
            return redirect('/home')->with('status','You are not allowed to the admin dashboard');
        }
    }
}
