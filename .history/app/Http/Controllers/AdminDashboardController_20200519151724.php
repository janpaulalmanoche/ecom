<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(){
        
        $new_orders = Order::with('ordersz','customer')->get();

        $new_orders->map(function($orders){
            $orders->formated_created = date('F d Y h:i:s a',strtotime($orders->created_at));
            return $orders;
        });
        return response()->json($new_orders);
    }
}
