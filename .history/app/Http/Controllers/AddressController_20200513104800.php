<?php

namespace App\Http\Controllers;
use App\Baranggay;
use App\City;
use App\Order;

use App\Street;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    //

    public function city(){

        $count= Order::where('order_status','=','New')->get()->Count();
        return view('admin.address.city')->with(compact('count'));
    }

        public function ADDcity(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $newCity = new City;

            $newCity->city = $data['cityy'];
            $newCity->save();

            return redirect()->back()->with('flash_message_success', 'City Added Sucessfully');

            }

    }

    public function street(){

        $count= Order::where('order_status','=','New')->get()->Count();


        $levels =Baranggay::get();
        return view('admin.address.street')->with(compact('count','levels'));
    }

    public function ADDstreet(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            if(empty($data['bgid'])){
                return redirect()->back()->with("flash_message_error",'Please select City');
            }

            $strt = new Street;


            $strt->street = $data['streett'];
            $strt->baranggay_id = $data['bgid'];
            $strt->save();
            return redirect()->back()->with('flash_message_success', 'Street Added Successfully');
        }

    }


    public function baranggay(){



        $count= Order::where('order_status','=','New')->get()->Count();


        $levels =City::get();

        return view('admin.address.barangay')->with(compact('count','levels'));
    }

    public function ADDbaranggay(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $bg = new Baranggay;

            $bg->city_id = $data['city_id'];
            $bg->baranggay = $data['bg'];

            $bg->save();

            return redirect()->back()->with('flash_message_success','Baranggay Added Successfully');

        }
    }

    public function Ajaxcity(Request $request){

        $data=Baranggay::select('baranggay','id')->where('city_id',$request->id)->take(100)->get();
        return response()->json($data);

    }

}
