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
        $new_orders = Order::where('status','neww')->whereHas('ordersz', function (Builder $query)use($user_id) {
            $query->where('reseller_id', $user_id);
        })->get();

        return response()->json($new_orders);
    }
}
