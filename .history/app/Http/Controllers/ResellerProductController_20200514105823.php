<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResellerProductController extends Controller
{
    public function index(){
        return view('reseller.add_products.index');
    }
}
