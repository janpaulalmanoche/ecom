<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminResellerReport extends Controller
{
    public function index(){

        dd('test');
        return view('admin.reseller.report.index');
    }


}
