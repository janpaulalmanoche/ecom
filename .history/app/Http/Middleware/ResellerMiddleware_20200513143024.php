<?php

namespace App\Http\Middleware;

use App\Type;
use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

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
         
        $auth = Auth::check();

        $type = Type::where('type','reseller')->first();
        
        if($auth && auth()->user()->type_id !=  $type->id){
            abort(404);
        }
       
        if($auth == true){
            
            return $next($request);
        }else{
            return redirect('admin');
        }
    }
}
