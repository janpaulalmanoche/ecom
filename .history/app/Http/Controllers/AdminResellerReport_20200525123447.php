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
            
            $order_product = OrderProducts::where('reseller_id',$request->resller_id)->get();
            
    }

}
