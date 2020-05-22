<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderProduct;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ResellerDashBoardController extends Controller
{
    
    public function index()
    {

        return view('reseller.dashboard');
    }

    public function new_orders($user_id)
    {
        $new_orders = Order::whereHas('ordersz', function (Builder $query)use($user_id) {
            $query->where('reseller_id', $user_id);
        })->with(['ordersz' => function($query)use($user_id){
                $query->where('reseller_id',$user_id);
            },'customer','ordersz.reseller'])->where('order_status','new')->get();

        $new_orders->map(function($orders){
            $orders->formated_created = date('F d Y h:i:s a',strtotime($orders->created_at));
            return $orders;
        });
        return response()->json($new_orders);
    }
    public function total_profit($user_id){

        $find = User::find($user_id);
       $order_products = OrderProduct::where('reseller_id',$find->id)->get();
       $total =  $order_products->sum('price_multiply_quantity');

       return response()->json($total);

    }
}
