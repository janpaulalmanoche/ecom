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

    public function new_orders()
    {
        $new_orders = Order::whereHas('ordersz', function (Builder $query) {
            $query->where('reseller_id', auth()->user()->id);
        })->get();

        return response()->json($new_orders);
    }
}
