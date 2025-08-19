<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class AuthAdmin
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
        if(Auth::check() && Auth::user()->utype==='ADM'){
           // return $next($request);
        }else{
           return redirect('/');
            
        }
        return $next($request);
    }
}
