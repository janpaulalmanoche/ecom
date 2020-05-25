<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\OrderProduct;
use App\OrderShipping;
use App\Product;
use App\Traits\UnionBankAuthTrait;
use App\Traits\UnionBankMerchantPaymentTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use Illuminate\Support\Str;
use App\User;
class OrderController extends Controller
{

use UnionBankAuthTrait;


    //checkout p
    public function checkout(Request $request){
        $user_id=Auth::User()->id;//get the id from the authentication ,auth
        $user_details= User::find($user_id);//then getting the otheer data base onh the auth id
//          echo "<pre>"; print_r($user_details); die;

        //update the useraccount information for billing

        if($request->isMethod('post')){
            $data=$request->all();
            if(empty($data['name'])){
                return redirect()->back()->with('flash_message_error','Please enter your Name ');
            }
            if(empty($data['street'])){
                $data['street'] = '';
            }
            if(empty($data['baranggay'])){
                $data['baranggay'] = '';
            }
            if(empty($data['city'])){
                $data['city'] = '';
            }
            if(empty($data['mobile'])){
                $data['mobile'] = '';
            }


//            echo"<pre>"; print_r($data);die;
            $user = User::find($user_id);
            $user->f_name = $data['name'];
            $user->m_name = $data['m_name'];
            $user->l_name = $data['l_name'];
            // $user->street = $data['street'];
            // $user->baranggay = $data['baranggay'];
            // $user->city = $data['city'];
            // $user->mobile = $data['mobile'];
            $user->save();
          return redirect('/order-review');




        }


        $session_id =Session::get('session_id');//get the session id we created in public function addtocart

        $userCart= Cart::where(['session_id'=>$session_id])->get();

        //get image
        foreach( $userCart as $key => $product){
            $productDetails= Product::where('id', $product->product_id)->first();//compare the two id 'id', $product->product_id
            //we are getting the image from the producttaable with the id same to cart prodcut_id
            $userCart[$key]->image= $productDetails->image;
        }



        //save the email when clicking the checkout button form the cart page
        $user_email = Auth::User()->email;
        $session_id =Session::get('session_id');
        DB::table('carts')->where(['session_id'=>$session_id])->update(['user_email'=>$user_email]);


        $getSessionID =  $session_id = Session::get('session_id');
        $countProductsinCart = DB::table('carts')->where('session_id' ,$getSessionID)->get()->count();

        //for dynamic dropdown
        // $list = DB::table('city_baranggay_street')->groupBy('City')->get();

        return view('users.checkout')->with(compact('userCart','user_details',
            'countProductsinCart'));
    }


    //order review
    public function orderReview(Request $request){

        $user_id = Auth::User()->id;//we can access the login users information using auth because of sessions in laravel
        $user_email = Auth::User()->email;//we can access the login users information using auth because of sessions in laravel
        $user_details=User::where('id',$user_id)->first();

        //get the productrs from crrt using session id
        $session_id =Session::get('session_id');//get the session id we created in public function addtocart
//        $userCart=DB::table('cart')->where(['user_email'=>$user_email])->get();//dont use email.cause it will ge all products with the ame email
        $userCart= Cart::where(['session_id'=>$session_id])->get();

        //get image
        foreach( $userCart as $key => $product){
            $productDetails= Product::where('id', $product->product_id)->first();//compare the two id 'id', $product->product_id
            //we are getting the image from the producttaable with the id same to cart prodcut_id
            $userCart[$key]->image= $productDetails->image;
        }


//        //to save in order table
//        if($request->isMethod('post')){
//            $data=$request->all();
//
//            $orders= new Order;
//
//            $orders-> product_id = $user_id;
//            $orders-> user_email = $user_email;
//            $orders-> session_id = $session_id;
//
//
//            $orders->save();
//        }

        $getSessionID =  $session_id = Session::get('session_id');
        $countProductsinCart = DB::table('carts')->where('session_id' ,$getSessionID)->get()->count();
        return view('products.order_review')->with(compact('user_details','userCart','countProductsinCart'));

    }


//save order to table//order review page is the view where we save
    public function aaveOrder(Request $request){
   
        // union bank trait

        if($request->isMethod('post')){
            $this->validate($request,[
                'total' => 'required:integer',
                "zip_code" => 'required',
                "city" => 'required|min:3',  
                "baranggay" => 'required|min:5',  
                "street" => 'required|min:5',  
                "phone_number" => 'required|min:11',  
                // "optional_field" => 'max:3',  
                ]);
                // dd($request->all());

            try{

                $data=$request->all();
                $user_id = Auth::User()->id;//we can access the login users information using auth because of sessions in laravel
                $user_email= Auth::User()->email;

                    $pin = mt_rand(1000000,9999999);
                    $refferenceNO = Str::uuid(); 
                    // dd(Session::get('access_token_union'));
                    if(empty(Session::get('access_token_union'))){
                            return redirect('/generate-code');
                    }
                   $payment_merchant =  $this->payment_merchant($data['total'],$refferenceNO);

                $order= new Order;
    
                $order->user_id = auth()->user()->id;
                $order->total_amount = $data['total'];
                $order->order_status = "paid";
                $order->refference_number= $refferenceNO;
                $order->sender_reference_id= $payment_merchant;
                $order->save();

                if(empty($request->optional_field){
                    $request->optional_field = ''
                });
                $order_shipping = new OrderShipping;
                $order_shipping->order_id = $order->id;
                $order_shipping->zip_code = $data['zip_code'];
                $order_shipping->city = $data['city'];
                $order_shipping->baranggay = $data['baranggay'];
                $order_shipping->street = $data['street'];
                $order_shipping->other_details = $data['optional_field'];
                $order_shipping->phone_no = $data['phone_number'];
                $order_shipping->save();
                
                //second query for ordered products
                //get the productrs from crrt using session id
                $session_id =Session::get('session_id');//get the session id we created in public function addtocart
                //        $userCart=DB::table('cart')->where(['user_email'=>$user_email])->get();//dont use email.cause it will ge all products with the ame email
                //            $userCart=DB::table('cart')->where(['session_id'=>$session_id])->get();
                
                $order_id = $order->id; // to get the last insert id
                
                //           $
                //            $cartProducts = DB::table('cart')->where(['user_email'=>$user_email])->get(); //when we use this it wil get all all the products added to acart using the email even on the pasdt
                $cartProducts = Cart::where(['session_id'=>$session_id])->get();//**
    
                // dd($cartProducts);
                //we are getting all the data in cart table where session id is equal to the present session id so it wont get the product data in the past
                foreach($cartProducts as $pro){//we rename the cartProducts as pro  //**
    
                    $cartPro = New OrderProduct; //**
                    $cartPro ->order_id = $order_id;
                    $cartPro ->product_id = $pro->reseller_product()->first()->products()->first()->id;//we call $pro->product_id to get the id from the cart
                    $cartPro ->price =  $pro->resell_price;
                    $cartPro ->reseller_id =  $pro->reseller_id;
                    $cartPro ->quantity =  $pro->quantity;
                    $cartPro->save();
                }
    //            //subtrat the quantity of the ordered products to products stock
    //            $cartProducts = DB::table('cart')->where(['session_id'=>$session_id])->get();
    //            foreach($cartProducts as $pro){
    //                $cartPro =new Product;
    //
    //            }
                DB::table('carts')->where('user_email',$user_email)
                ->delete();//after checkout delete the record where useremail = the auth user email
    
                $tt= Order::where('id',$order_id)->first();
                $TTRFN= $tt->refference_number;
    
                Session::put('order_id',$TTRFN); // set sessionms and value is the order_id
                Session::put('total_amount',$data['total']);// set sessionms and the value is the total of the cart
    
    //
    //           $order_productS = OrderProduct::where('product_id','=', '1')->get();
    //
    //            DB::table('products')->decrement('stock', $cartProducts->product_id);
    
                //try
    //            DB::table('products')->where('id','=',$order_productS->product_id)->decrement('stocks', $order_productS->quantity);
                return redirect('/ty');

            }catch(\Exception $e){
                
                dd($e);
            
            }
        }
        $getSessionID =  $session_id = Session::get('session_id');
        $countProductsinCart = DB::table('carts')->where('session_id' ,$getSessionID)->get()->count();
        return view('users.thanks')->with(compact('countProductsinCart'));
    }



    //new orders
    public function OrderHistory(){
//        /orders-history
        $user_id = Auth::User()->id;

        $orders = Order::with('ordersz','products')
            ->where('user_id',$user_id)
            ->where('order_status' , '=' , 'Paid')->get();

        $countORD= $orders->count();

            foreach($orders as $u){
                $mytime = $u->created_at->addDays(1);
            }
//
//        $mytime =Carbon::now()->addDays(1);


//
//        echo"<pre>"; print_r($getNeworders);die;

        $orders2 = Order::with('ordersz','products')
            ->where('user_id',$user_id)
            // ->where('order_status' , '=' , 'New' )
           ->get();
        $countORD2= $orders2->count();

        $getSessionID =  $session_id = Session::get('session_id');
        $countProductsinCart = DB::table('carts')->where('session_id' ,$getSessionID)->get()->count();

        return view('users.order_history')->with(compact('countORD2',
                'orders2','countProductsinCart','countORD'));
    }

    public function PaidOrderHistory(){
        $user_id = Auth::User()->id;

        $orders = Order::with('ordersz','products')
            ->where('user_id',$user_id)
            ->where('order_status' , '=' , 'Paid')->get();

        $countORD= $orders->count();


        $getSessionID =  $session_id = Session::get('session_id');
        $countProductsinCart = DB::table('carts')->where('session_id' ,$getSessionID)->get()->count();

        return view('users.paidorders')->with(compact('orders','countProductsinCart','countORD'));
    }



}
    //to compare the id of two table and get the value using Auth
//            $var1= Auth::User()->id;  WORKING FINE possible on  using auth only //*****************
//            $cartProducts = DB::table('orders')->where(['user_id'=>$var1])->get();//**

//$categories=Category::pluck('name','id');




//to compare the id of two tables and get their data//*****************//*****************
////*****************//***************** WORKING FINE
//$productIDs = OrderProduct::distinct()->pluck('product_id');//*****************//*****************
//
//$orderedProducts = Product::whereIn('id', $productIDs)->get();//*****************//*****************
