<?php

namespace App\Http\Controllers;

use App\Order;
use App\PriceHistory;
use App\Product;
use Illuminate\Http\Request;

class PriceHistoryController extends Controller
{
    //

    public function ViewProducts(){

        $products = Product::get();
        $count= Order::where('order_status','=','New')->get()->Count();//to display numbers of new order status
        return view('admin.priceHistory.viewP')->with(compact('products','count'));
    }


    public function viewProductPriceHistory($id){

        $getpricelist = PriceHistory::with('pro')->where('product_id',$id)->get();
        $getproname= Product::where('id',$id)->first();

        $count= Order::where('order_status','=','New')->get()->Count();//to display numbers of new order status
        return view('admin.priceHistory.viewPH')->with(compact(getpricelist','count','getproname'));
    }

}
