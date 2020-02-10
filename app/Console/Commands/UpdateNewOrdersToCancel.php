<?php

namespace App\Console\Commands;

use App\OrderProduct;
use App\Product;
use App\ProductFormRequestStock;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Order;

class UpdateNewOrdersToCancel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:UpdateNewOrdersToCancel'; //name of our command you make

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() // make our function here
    {
        //

        $getNeworders = Order::with('products')
            ->where('order_status', '=' ,'In Process')
            ->whereDate('created_at' , '<' ,Carbon::now()->subMinutes(1440))->get();
        //1440minutes in 24hrs

        foreach($getNeworders as $try) {
            $gettheid= $try->id;
               Order::where(['id'=>$gettheid])->update(['order_status' =>'Cancelled']);

               //for increment
               $ordersProd= OrderProduct::where(['order_id' => $gettheid])->get();
               foreach($ordersProd as $orderProd){
                   $hhh = $orderProd->product_id;
                   $tt = $orderProd->quantity;
                   Product::where('id',$hhh)->increment('stock',$tt);
                    }

        }

        $productREQEUST = ProductFormRequestStock::whereRaw('stocks_requested = stocks_delivered')->get();

        foreach($productREQEUST as $hehe){
            $getIDD = $hehe->id;
            ProductFormRequestStock::where(['id'=>$getIDD])->update(['status'=>'Delivered']);

        }




        dd($getNeworders);

//        Product::where(['id'=>$id])->update
//        (['category_id' =>$data['category_id'],
//            'product_name' =>$data['product_name'],
//            'product_code' =>$data['product_code'],
//            'brand' =>$data['product_brand'],
//            'description' =>$data['description'],
//            'price' =>$data['price'],
//            'size' => $data['sizes'],
//            'stock' => $data['stock'],
//            'measurement' => $data['measurements'],
//            'image'=>$filename]);
//
//        return redirect('/admin/view-products')->with('flash_message_success','Product has been
//            updated successfully');


//    }
//            upadte for pending status in Product form request after updating the required correct total
//        stocks request


}
}
