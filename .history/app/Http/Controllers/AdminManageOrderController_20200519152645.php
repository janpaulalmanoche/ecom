<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Measurement;
use App\Order;
use App\OrderProduct;
use App\ProductsAttribute;
use App\User;
use Intervention\Image\ImageManagerStatic;
use Image;
use App\Category;
use App\Product;

//for image
use Illuminate\Support\Facades\Input;
use phpDocumentor\Reflection\Types\Null_;
use Session;
use Auth;
use DB;




class AdminManageOrderController extends Controller
{
    //


//    //view orders ,admin
//    public function viewCustomerOrders(){
//
//        $orders = Order::with('ordersz')->get();
////        echo "<pre>"; print_r($orders);die;
////
////del
//        foreach($orders as $tryr) {
//            $getOrderId = $tryr->id;
//            $compareToOrderProductstbl = OrderProduct::with('prod2')->where('order_id', $getOrderId)->get();
//        }
//        foreach($compareToOrderProductstbl as $tt){
//            $getProd_idfromOrderProdTbl= $tt->product_id;
//            $getProductName = Product::with('hehe')->where('id',$getProd_idfromOrderProdTbl)->get();
////            foreach($compareToOrderProductstbl as $tryy){
////                $getProd_idfromOrderProdTbl= $tryy->product_id;
////
////                $getProductName = Product::where('id',$getProd_idfromOrderProdTbl)->get();
//////                echo "<pre>"; print_r($getProductName);die;
////            }
////            echo "<pre>"; print_r($compareToOrderProductstbl);die;
//
//        }
////
////            echo "<pre>"; print_r($getProductName);die;
//
////        foreach($orders->ordersz as $try){
////            $tgetID = $try->id;
////            $getTheProdName= Product::where('id',$tgetID)->get();
////        }
////        echo "$tgetID";die;
////del
//        //for email
//        foreach($orders as $hhh){
//            $em = $hhh->user_id;
//            $userem= User::where('id',$em)->get();
//        }
//
//        //foremail
//
//        $count= Order::where('order_status','=','New')->get()->Count();//to display numbers of new order status
////        $user_id = $orders->pluck('user_id');
////        foreach($user_id as $key => $product){
////            $user_details = User::where('id',$product)->get();
////
////        }
////        $userCart=DB::table('cart')->where(['session_id'=>$session_id])->get();
//
//        return view('admin.orders.view_customers_order')->with(compact('orders','count','getProductName','userem'));
//    }

    public function viewCustomerOrders(){//status new

//     $orders = Order::with('products')->get();//orig
//
//        $orders2= Order::with('ordersz')->get();

        //best way to use when you have 4 or more tables is to use join
        //as for pivot table it only functions on three tables
//
//        $orders = Order::with('products')->distinct()
//            ->join('users','users.id' , 'orders.user_id')
//            ->join('order_products' , 'order_products.order_id' ,'orders.id')
//            ->join('products' , 'products.id' , 'order_products.product_id')
//                ->select('orders.id' ,
//                    'orders.user_id' ,
//                    'users.f_name' ,
//                    'users.m_name' ,
//                    'users.l_name' ,
//                    'order_products.order_id'  ,
//                    'order_products.product_id' ,
//                    'products.product_name' ,
//                    'order_products.quantity' ,
//                    'orders.total_amount' ,
//                    'orders.created_at',
//                    'orders.order_status',
//                    'users.email'
//                    )
//            ->groupBy('orders.id')
//            ->where('orders.order_status','=','New')
//                    ->get();
//echo"<pre>"; print_r($orders);die;

        $orders = Order::with('products' , 'user')
            ->where('order_status', '=' , 'New')
            ->get();
          
        $count= Order::where('order_status','=','New')->get()->Count();//to display numbers of new order status

        return view('admin.orders.view_customers_order')->with(compact('orders','count'));
    }

public function viewPaidCustomerOrders(){
//    $orders = Order::with('products')
//        ->select('orders.id' ,
//            'orders.user_id' ,
//            'users.f_name' ,
//            'users.m_name' ,
//            'users.l_name' ,
//            'order_products.order_id'  ,
//            'order_products.product_id' ,
//            'products.product_name' ,
//            'order_products.quantity' ,
//            'orders.total_amount' ,
//            'orders.created_at',
//            'orders.order_status',
//            'users.email'
//        )
//        ->join('users','users.id' , 'orders.user_id')
//        ->join('order_products' , 'order_products.order_id' ,'orders.id')
//        ->join('products' , 'products.id' , 'order_products.product_id')
//        ->groupBy('orders.id') // then go to config/databse.php ,in mysql, change strict to false
//      ->where('orders.order_status', '=', 'Paid')
//        ->get();
//echo"<pre>"; print_r($orders);die;

    $orders = Order::with('products' , 'user')
        ->where('order_status', '=' , 'Paid')
        ->get();


    $count= Order::where('order_status','=','New')->get()->Count();
        return view('admin.orders.view_paid_customer_order')->with(compact('count','orders'));
}

//for in process order
public function viewInProcesslOrders(){

//    $orders = Order::with('products')
//        ->select('orders.id' ,
//            'orders.user_id' ,
//            'users.f_name' ,
//            'users.m_name' ,
//            'users.l_name' ,
//            'order_products.order_id'  ,
//            'order_products.product_id' ,
//            'products.product_name' ,
//            'order_products.quantity' ,
//            'orders.total_amount' ,
//            'orders.created_at',
//            'orders.order_status',
//            'users.email'
//        )
//        ->join('users','users.id' , 'orders.user_id')
//        ->join('order_products' , 'order_products.order_id' ,'orders.id')
//        ->join('products' , 'products.id' , 'order_products.product_id')
//        ->groupBy('orders.id') //fix the error-> go to config/databse.php ,in mysql, change strict to false
//        ->where('orders.order_status', '=', 'In Process')
//        ->get();
//echo"<pre>"; print_r($orders);die;


    $orders = Order::with('products' , 'user')
        ->where('order_status', '=' , 'In Process')
        ->get();

    $count= Order::where('order_status','=','New')->get()->Count();
    return view('admin.orders.view_in_process_order')->with(compact('count','orders'));
}

//display cancel orders
public function viewCancelOrders(){

//    $orders = Order::with('products')
//        ->select('orders.id' ,
//            'orders.user_id' ,
//            'users.f_name' ,
//            'users.m_name' ,
//            'users.l_name' ,
//            'order_products.order_id'  ,
//            'order_products.product_id' ,
//            'products.product_name' ,
//            'order_products.quantity' ,
//            'orders.total_amount' ,
//            'orders.created_at',
//            'orders.order_status',
//            'users.email'
//        )
//        ->join('users','users.id' , 'orders.user_id')
//        ->join('order_products' , 'order_products.order_id' ,'orders.id')
//        ->join('products' , 'products.id' , 'order_products.product_id')
//        ->groupBy('orders.id') //fix the error-> go to config/databse.php ,in mysql, change strict to false
//        ->where('orders.order_status', '=', 'Cancelled')
//        ->get();


    $orders = Order::with('products' , 'user')
        ->where('order_status', '=' , 'Cancelled')
        ->get();



//echo"<pre>"; print_r($orders);die;
    $count= Order::where('order_status','=','New')->get()->Count();
    return view('admin.orders.view_cancelled_order')->with(compact('count','orders'));
}



    //vjiew order detail
    public function viewCustomerOrdersDetails($order_id){
        $count= Order::where('order_status','=','New')->get()->Count();//to display numbers of new order status

        $orders = Order::with(['products', 'ordersz'])->where('id',$order_id)->first();// first we have a condition

//        echo"<pre>";print_r($orders3);die;

        $user_id = $orders->user_id; //then we pull the id in that condition table
        $user_details = User::where('id',$user_id)->first(); //and use it to compare to the other table to get his data

        $orders4 = Order::with('products')->where('id',$order_id)->get();//orig

        return view('admin.orders.order_detail')->with(compact('orders','user_details','count','orders4'));

    }

    public function updateOrderStatus(Request $request ){

        if($request->isMethod('post')){
            $data = $request->all();

            Order::where('id',$data['order_id'])->update(['order_status'=>$data['status']]);
            return redirect()->back()->with('flash_message_success','Order Status has Been updated Successfully');
        }
    }



//        $orders = Order::with(['products', 'ordersz'])->where('id',$order_id)->first();// first we have a condition
//
//        $orders2 = Order::with('ordersz')->where('id',$order_id)->first();
        //to acess the ordesz\

//join //doing fine

//        $orders3 = DB::table('orders')
//            ->join('order_products' , 'order_products.order_id' , 'orders.id')
//            ->join('products' , 'products.id' , 'order_products.product_id')
//            ->join('users' , 'users.id' , 'orders.user_id')
//            ->select(  'order_products.order_id' ,
//                'orders.created_at',
//                'order_products.product_id',
//                'order_products.quantity',
//                'orders.total_amount',
//                'users.name',
//                'users.address'
//            )
//
//            ->where('orders.id' , $order_id)
//            ->get();
//echo"<pre>"; print_r($orders3);die;
    public function OrderInvoice($order_id){
        $count= Order::where('order_status','=','New')->get()->Count();//to display numbers of new order status

        $orders = Order::with('products')->where('id',$order_id)->get();//orig

        $mytime = Carbon::now();
//        echo"<pre>";print_r($mytime);die;


//
        foreach($orders as $ttry){
            $getuserID = $ttry->user_id;
             $matchid= User::where('id',$getuserID)->first();
        }

        return view('admin.orders.order_invoice')->with(compact('orders','count','mytime','matchid'));

    }



}



//*************** !!!!!!!!! 8******* !!!!!!!! ******** !!!!!!!!1
//this is the code we are looking for the foreign keys in each table and compare them )
//i thinks it is only possible because we are using the ->first(); ***** we are getting only the result of one column
//  $orderDetail = Order::with('ordersz')->where('id',$order_id)->first();// first we have a condition
//  $user_id = $orderDetail->user_id; //then we pull the id in that condition table
//  $user_details = User::where('id',$user_id)->first(); //and use it to compare to the other table to get his data





//$productIDs = OrderProduct::distinct()->pluck('product_id');//*****************//*****************
//
//$orderedProducts = Product::whereIn('id', $productIDs)->get();//*****************//*****************