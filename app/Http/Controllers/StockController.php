<?php

namespace App\Http\Controllers;

use App\Product;
use App\Order;
use App\ProductFormRequestStock;
use App\Supplier;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class StockController extends Controller
{

    public function ViewStocks(){
        $pro=Product::get();

        $count= Order::where('order_status','=','New')->get()->Count();
        return view('admin.stock.view_stock')->with(compact('pro','count'));
    }

    public function addstocks(Request $request,$id)
    {
        $displayProd = Product::where('id', $id)->first();
        $count = Order::where('order_status', '=', 'New')->get()->Count();

        $supplier = Supplier::get();

        $supplierss = "<option value='' selected disable>Select</option>";
        foreach($supplier as $s) {

            $supplierss .= "<option value='" . $s->id . "' > " . $s->supplier_name . " </option>";

        }

        return view('admin.stock.add_stock')->with(compact('displayProd', 'count','supplierss'));
    }

    //add stock link, revise version
    public function ADDS(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            Product::where('id',$data['id'])->increment('stock',$data['stock']);


            //second query

            if($data['stock'] == $data['stockRequested'] ){

                $statusss = "Delivered";
            }
            else {
                $statusss = "Pending";
            }

            $doublequery = New ProductFormRequestStock;
            $doublequery->product_id = $data['id'];
            $doublequery->supplier_id = $data['supplier'];

            $doublequery->stocks_requested = $data['stockRequested'];

            $doublequery->stocks_delivered = $data['stock'];

            $doublequery->date_delivered = $data['dateDelivered'];
            $doublequery->status = $statusss;
            $doublequery->save();







        }
        return redirect('/admin/view-product-stocks');

        }

        public function ViewAddedStocks(){

        $getdetails = ProductFormRequestStock::with('supplierR','productsR')
            ->where('status', '=' ,'Delivered')
            ->get();
            $count = Order::where('order_status', '=', 'New')->get()->Count();

        return view('admin.stock.view_added_stock_history')->with(compact('getdetails','count'));
        }

        public function viewPstock(){

            $getdetails = ProductFormRequestStock::with('supplierR','productsR')
                ->where('status', '=' ,'Pending')
                ->get();
            $count = Order::where('order_status', '=', 'New')->get()->Count();

            return view('admin.stock.Pstock')->with(compact('getdetails','count'));
        }

        public function Pfrom($id){

        $getdetails= ProductFormRequestStock::with('productsS','supplierRS')->where('id',$id)->first();
            $count = Order::where('order_status', '=', 'New')->get()->Count();

            return view('admin.stock.editFormP')->with(compact('getdetails','count'));
        }



        public function UPS(Request $request,$id=null){
        if($request->isMethod('post')) {
            $data = $request->all();

            $checkTHEnumber = $data['PS'];


            $get = ProductFormRequestStock::where('id', $id)->first();
            $getSD = $get->stocks_requested;
//
            $getDS = $get->stocks_delivered;

            $subtract = $getSD - $getDS;


            if ($checkTHEnumber > $subtract) {
                return redirect()->back()->with('flash_message_error', 'Remaing pending stocks cant be more
             than The Requested stock');

            }
//
//            if($checkTHEnumber < $getDS ){
//                return redirect()->back()->with('flash_message_error','Remaing pending stocks cant be less
//             than The Delivered stock');
//
//            }
            else {

                ProductFormRequestStock::where('id', $id)->increment('stocks_delivered', $data['PS']);


            }


        }
//        }
//            $gett = ProductFormRequestStock::where('id',$id)->first();
//            $getSDs =$gett->stocks_requested;
////
//            $getDSs =$gett->stocks_delivered;
//            if($getSDs == $getDSs){
//
//
//                ProductFormRequestStock::where('id',$id)->update('status=','Delivered');
//            }

            return redirect()->back();

        }

}
