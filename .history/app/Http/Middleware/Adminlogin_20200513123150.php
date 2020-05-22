<?php

namespace App\Http\Middleware;

use App\Type;
use Closure;
use Illuminate\Support\Facades\Auth;
use Session;


class Adminlogin
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
        dd($request->all());

        // if(empty(Session::has('adminSession'))){

        //     return redirect('/admin')->with('flash_message_error','you need to login first');
        // }
        //to check if there is a session,if no,then redirect to login regidter pge
        //aand dont forget to import session on top use Session;
        //amnd update kernel.php file
            $auth =  Auth::check();

            $type = Type::where('type','admin')->first();

            if($auth && auth()->user()->type_id !=  $type->id){
                abort(40);
            }
           
            if($auth == true){
                
                return $next($request);
            }else{
                return redirect('admin');
            }
        

    
    }
}
