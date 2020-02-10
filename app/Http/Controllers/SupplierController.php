<?php

namespace App\Http\Controllers;

use App\Order;
use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{

    public function supplierAddForm()
    {

        $count = Order::where('order_status', '=', 'New')->get()->Count();
        return view('admin.supplier.supplier_add_form')->with(compact('count'));
    }

    public function insertSupplier(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            $checkifexist = Supplier::where('supplier_name', $data['supname'])->count();
            if ($checkifexist > 0) {
                return redirect()->back()->with('flash_message_error', 'Supplier name Already Exist');
            }

            $saveSupplier = new Supplier;
            $saveSupplier->supplier_name = $data['supname'];
            $saveSupplier->save();


        }
        return redirect()->back()->with('flash_message_success', 'Supplier Successfully Saved');

    }

    public function viewsupplier()
    {
        $getsupplier = Supplier::all();

        $count = Order::where('order_status', '=', 'New')->get()->Count();
        return view('admin.supplier.viewsupplier')->with(compact('count','getsupplier'));

    }

    public function editsupplier($id){

        $getinfformation= Supplier::find($id);

        $count = Order::where('order_status', '=', 'New')->get()->Count();
        return view('admin.supplier.editsup')->with(compact('count','getinfformation'));

    }

    public function editfunction(Request $request){

        if($request->isMethod('post')) {
            $data = $request->all();
            $theid= $data['ids'];

            Supplier::where(['id' => $theid ])->update
            ([
                'supplier_name' => $data['supname']
            ]);

            return redirect('/admin/view-supplier')->with('flash_message_success', 'Supplier Successfully Saved');;


        }


    }

}
