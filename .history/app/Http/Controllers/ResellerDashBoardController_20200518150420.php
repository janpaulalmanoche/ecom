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
        $new_orders = Order::with(['ordersz' => function($query){
            
        }])->get();

        // $new_orders2 = $new_orders->where('status','neww')->get();

        return response()->json($new_orders);
    }
}
