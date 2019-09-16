<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
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
        if(session()->exists('user')){
            return $next($request);
        }
        else{
            session()->flash('logindo','登录后才能查阅');
            return redirect('login');
        }
    }
}
