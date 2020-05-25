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
        dd($request->date);
        $this->validate($request,[
            'reseller_id'  => "required|integer",
            'date'  => "required|date",
            ]);
            
            $order_product = OrderProducts::
            where('reseller_id',$request->reseller_id)
            ->whereMonth('created_at',$request->date)
            ->get();

            $date = $request->date;
           return view('admin.reseller.report.monthly_profit_result',compact('order_product','date'));
    }

}
