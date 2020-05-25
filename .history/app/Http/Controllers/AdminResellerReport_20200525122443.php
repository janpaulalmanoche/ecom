<?php

namespace App\Http\Controllers;

use App\Reseller;
use App\Type;
use Illuminate\Http\Request;

class AdminResellerReport extends Controller
{
    public function index(){

        // dd('test');
        $type = Type::where('type','=','reseller')->first();
        return view('admin.reseller.report.index',compact('resellers'));
    }


}
