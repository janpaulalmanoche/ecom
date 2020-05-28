<?php

namespace App\Http\Controllers;

use App\Order;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ResellerOrderController extends Controller
{
    public function index()
    {
        return view('reseller.order.index');
    }
    public function show($order_id)
    {
        $new_order = Order::find($order_id);
        dd($order->ordersz()->where('reseller_id',auth()->user()->id)->get());

        $user_id = auth()->user()->id;
        // $new_order = Order::whereHas('ordersz', function (Builder $query) use ($user_id) {
        //     $query->where('reseller_id', $user_id);
        // })->with(['ordersz' => function ($query) use ($user_id) {
        //     $query->where('reseller_id', $user_id);
        // }, 'customer', 'ordersz.reseller'])
        //     ->where('order_status', 'new')
        //     ->where('id', $order_id)
        //     ->first();

        $order_products = $new_order->ordersz()->where('reseller_id', $user_id)->get();

        $order_products->map(function($sum){
            $sum->price_multiply_quantity = $sum->price * $sum->quantity;
            return $sum;
        });
       $total =  $order_products->sum('price_multiply_quantity');



        return view('reseller.order.show', compact('new_order', 'total'));
    }
    public function new_orders($user_id)
    {

        $new_orders = Order::whereHas('ordersz', function (Builder $query) use ($user_id) {
            $query->where('reseller_id', $user_id);
        })->with(['ordersz' => function ($query) use ($user_id) {
            $query->where('reseller_id', $user_id);
        }, 'customer', 'ordersz.reseller'])->whereDate('created_at', Carbon::now())->get();

        $new_orders->map(function ($orders) {
            $orders->formated_created = date('F d Y h:i:s a', strtotime($orders->created_at));
            return $orders;
        });
        return response()->json($new_orders);
    }
    public function order_by_date($user_id, $date)
    {

        $new_orders = Order::whereHas('ordersz', function (Builder $query) use ($user_id) {
            $query->where('reseller_id', $user_id);
        })->with(['ordersz' => function ($query) use ($user_id) {
            $query->where('reseller_id', $user_id);
        }, 'customer', 'ordersz.reseller'])
        ->whereDate('created_at',Carbon::parse($date))
        ->where('order_status', 'new')->get();

        $new_orders->map(function ($orders) {
            $orders->formated_created = date('F d Y h:i:s a', strtotime($orders->created_at));
            return $orders;
        });
        return response()->json($new_orders);
    }
}
