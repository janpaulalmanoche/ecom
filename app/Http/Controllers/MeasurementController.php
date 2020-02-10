<?php

namespace App\Http\Controllers;

use App\Measurement;
use App\Order;
use Illuminate\Http\Request;

class MeasurementController extends Controller
{
    //
    public function measurement(Request $request){
        $count= Order::where('order_status','=','New')->get()->Count();//to display numbers of new order status
       if($request->isMethod('post')){
           $data = $request->all();

           $measurement = new Measurement;

           $measurement->Measurement_name = $data['mname'];

           $measurement->Measurement_code = $data['mcode'];
           $measurement->save();

           return redirect()->back()->with('flash_message_success','Measurement Save!');
       }

        return view('admin.measurement.add_measurement')->with(compact('count'));
    }
}
