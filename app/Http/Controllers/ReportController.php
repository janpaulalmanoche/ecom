<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\OrderProduct;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function DailyReportForm(){

        $count= Order::where('order_status','=','New')->get()->Count();

        return view('admin.report.dailyreport')->with(compact('count'));
    }

    public function DDreport(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $hi = $data['dateDR'];

            $mytime = Carbon::now();
//            if($data['dateDR'] > $mytime){
//
//                return redirect()->back()->with('flash_message_error','Selected Date Could not be Ahead
//                of the main date');
//            }




//            $getorders = Order::with('products')
//                ->whereDate('created_at',$data['dateDR'])->get();

            $getorders = OrderProduct::with('product','getorders')
                ->whereDate('created_at',$data['dateDR'])->get();



        }
        $count= Order::where('order_status','=','New')->get()->Count();

        return view('admin.report.DRfrom')->with(compact('count','getorders','mytime','hi'));

    }

    public function viewp(){

        $count= Order::where('order_status','=','New')->get()->Count();//to display numbers of new order status

        $products = Product::get();//get all data from table

        foreach($products as $product => $val){ // to display the category name instead of id
            $category_name = Category::where(['id'=> $val->category_id])->first();
            $products[$product]->category_namee = $category_name->name;
        }//

        return view('admin.report.purchaseH')->with(compact('products','count'));// products our var name on top

    }

    public function PHform($id){
        $getproducts= OrderProduct::with('product')->where('product_id',$id)->get();

        $getproductNAME= Product::where('id',$id)->first();

        $mytime = Carbon::now();


        $count= Order::where('order_status','=','New')->get()->Count();

        return view('admin.report.PHform')
            ->with(compact('products','count','getproducts','mytime','getproductNAME'));
    }

    //random report view file
    public function randomViewpage(){

        $count= Order::where('order_status','=','New')->get()->Count();
        return view('admin.report.randomreport')->with(compact('count'));
    }
    public function randomSUBMIT(Request $request){
        if($request->isMethod('post')){

            $data = $request->all();
            $mytime = Carbon::now();

//            $random = Order::whereBetween('created_at', array($data['from'], $data['to']))->get();

            $random= Order::with('products','user')
              ->whereDate('created_at', '>=', $data['from'])
                ->whereDate('created_at', '<=', $data['to'])
//                ->groupBy('id')
                ->get();

            $from = $data['from'];
            $to = $data['to'];
//            echo"<pre>";print_r($random);
//            echo"<pre>";print_r($data['from']);
//            echo"<pre>";print_r($data['to']);

            $count= Order::where('order_status','=','New')->get()->Count();
        }

        return view('admin.report.RP')->with(compact('count','random','from','to','mytime'));
    }


}
