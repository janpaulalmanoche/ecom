<?php

namespace App\Http\Controllers;

use App\OrderProducts;
use App\Reseller;
use App\Type;
use App\User;
use Illuminate\Http\Request;

class AdminResellerReport extends Controller
{
    public function index(){

        // dd('test');
        $type = Type::where('type','=','reseller')->first();
        $resellers = User::where('type_id',$type->id)->get();
        return view('admin.reseller.report.index',compact('resellers'));
    }

    public function store(Request $request){
        
        $this->validate($request,[
            'reseller_id'  => "required|integer",
            'date'  => "required|date",
            ]);
            $explode = explode("-",$request->date);
          
            
            $order_product = OrderProducts::
            where('reseller_id',$request->reseller_id)
            ->whereMonth('created_at',$explode[1])
            ->whereYear('created_at',$explode[0])
            ->get();

            $order_product->map(function($sub_total){
                $sub_total->sub_total = $sub_total->price * $sub_total->quantity;
                return $sub_total;
            });
            $date = $request->date;
            $total = $order_product->sum('sub_total');
           return view('admin.reseller.report.monthly_profit_result',compact('order_product','date','total'));
    }

}
