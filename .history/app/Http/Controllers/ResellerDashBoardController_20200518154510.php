<?php

namespace App\Http\Controllers;

use App\Order;
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
            $orders->formated_created = date('F d Y h:iS',strtotime($orders->created_at));
            return $orders;
        });
        return response()->json($new_orders);
    }
}
