<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class Frontlogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
//php artisan make:middleware Frontlogin
//then go the kernel.php file.located in app/http, and in the bottom add your file name
    public function handle($request, Closure $next)
    {
        // if(empty(Session::has('frontSession'))){
        //     return redirect('/login-register')->with('flash_message_error','you need to login first');
        // }//to check if there is a session,if no,then redirect to login regidter pge
        // //aand dont forget to import session on top use Session;
        return $next($request);
    }
}

//original colde
//class Frontlogin
//{
//    /**
//     * Handle an incoming request.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  \Closure  $next
//     * @return mixed
//     */
////php artisan make:middleware Frontlogin
//    public function handle($request, Closure $next)
//    {
//        return $next($request);
//    }
//}
