<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
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

         if(!session()->has(['hrc_username','hrc_userid','hrc_userdetails']) && ($request->path() !='login')){
            return redirect('login')->with('fail','You must be logged in');
        }

        if(session()->has(['hrc_username','hrc_userid','hrc_userdetails']) && ($request->path() == 'login') ){
            return redirect ('dashboard');
        }
        return $next($request);
    }
}
