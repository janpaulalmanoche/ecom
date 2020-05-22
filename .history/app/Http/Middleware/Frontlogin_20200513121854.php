<?php

namespace App\Http\Middleware;

use App\Type;
use Closure;
use Illuminate\Support\Facades\Auth;
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
        $auth =  Auth::check();

        $type = Type::where('type','customer')->first();
        
        if($auth && auth()->user()->type_id !=  $type->id){
            abort(404);
        }
       
        if($auth == true){
            
            return $next($request);
        }else{
            return redirect()->back();
        }
       
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
