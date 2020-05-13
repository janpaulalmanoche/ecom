<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;

class ResellerMiddleware
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
        if(empty(Session::has('resellerSession'))){

            return redirect('/reseller')->with('flash_message_error','you need to login first');
        }
        //to check if there is a session,if no,then redirect to login regidter pge
        //aand dont forget to import session on top use Session;
        //amnd update kernel.php file

        return $next($request);
    }
}
