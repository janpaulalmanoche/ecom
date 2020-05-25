<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Order;
use App\Product;
use App\User;//TO ADD USER MODEL app/User.php
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;// to remove error Class 'App\Http\Controllers\Admin\Auth\Auth' not found
use Session;
use Illuminate\Support\Facades\Hash;//this to check hash password
class AdminController extends Controller
{//opening
    //
    use AuthenticatesUsers;

    public function login(Request $request){ //this is for the login

        // if($request->isMethod('post')){
              
        //     $this->validateLogin($request);
    
        //     // If the class is using the ThrottlesLogins trait, we can automatically throttle
        //     // the login attempts for this application. We'll key this by the username and
        //     // the IP address of the client making these requests into this application.
        //     if ($this->hasTooManyLoginAttempts($request)) {
        //         $this->fireLockoutEvent($request);
    
        //         return $this->sendLockoutResponse($request);
        //     }
    
        //     if ($this->attemptLogin($request)) {
        //         return $this->sendLoginResponse($request);
        //     }
    
        //     // If the login attempt was unsuccessful we will increment the number of attempts
        //     // to login and redirect the user back to the login form. Of course, when this
        //     // user surpasses their maximum number of attempts they will get locked out.
        //     $this->incrementLoginAttempts($request);
    
        //     return $this->sendFailedLoginResponse($request);
        // }
        return view('admin.admin_login');
    }//ending


    public function dashboard(){
      /*  if(Session::has('adminSession')){
//performs all dashboard tasks, compare the session to login, if it matches it goes to dash,if not match needs to login
        }
        else{
            return redirect('/admin')->with('flash_message_error','Please login');
        } */
        $count= Order::where('order_status','=','New')->get()->Count();//to display numbers of new order status

        $test = Order::whereDate('created_at','=',Carbon::today())->get();
        dd($test);
        $countUsers= User::get()->Count();
        $Totalorders = Order::get()->Count();

        //example of plucking somehintg again in the condition and compare it
        $displayLowStocks = Product::where('stock','=','0')->get();
    
        // dd($productsLowStocks);
        // foreach($productsLowStocks as $try){
        //     $get= $try->stock;
        //     $displayLowStocks= Product::where('stock',$get)->orderBy('id','ASC')->get();
        // }

        $NewOrdersDisplayinfo = Order::with('ordersz','user')->where('order_status','=','New')->orderBy('created_at','DESC')->get();


        return view('admin.dashboard')->with(compact('count','countUsers','Totalorders','displayLowStocks','NewOrdersDisplayinfo'));
    }

    public function logout(){
        Session::flush(); //to clear all sessions
        return redirect('/admin')->with('flash_message_success','logged out successfully');
    }

public function settings(){
    $count= Order::where('order_status','=','New')->get()->Count();//to display numbers of new order status
        return view('admin.settings')->with(compact('count'));
}

public function chkPassword(Request $request){
    $data = $request->all();
    $current_password = $data['current_pwd'];
    $check_password = User::where(['admin'=>'1'])->first();
    if(hash::check($current_password,$check_password->password)){
        echo "true"; die;
    }else{
        echo "false"; die;
    }
}

public function UpdatePassword(Request $request){//
    if($request->isMethod('post')){
        $data = $request->all();
        $check_password = User::where(['email' => Auth::user()->email])->first();
        $current_password = $data['current_pwd'];

        if(hash::check($current_password,$check_password->password)){
           $password = bcrypt($data['new_pwd']);
           User::where('id','1')->update(['password' => $password]);
           return redirect('/admin/settings')->with('flash_message_success','Password updated Successfully');
        }else{

            return redirect('/admin/settings')->with('flash_message_error','Incorrect Current Password');
        }
    }
}

}//clossing
