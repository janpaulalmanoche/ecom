<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }else{//this is the only code we add start form elese
            return redirect()->action('AdminController@login')->with('flash_message_error','Please login to access');
        }//

        return $next($request);
    }
}
/*

Guard as name suggests guards our routes from unauthorized access and we can use for admin pages or pages
that requires users to login. We just need to make changes in Middleware and our Route file for that.
And if you don't want to use them then you need to check in your every function separately with Auth::check that
 the user is logged in or not.﻿


 */