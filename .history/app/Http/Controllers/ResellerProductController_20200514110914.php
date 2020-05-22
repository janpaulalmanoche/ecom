<?php

namespace App\Http\Controllers;

use App\ResellerProducts;
use Illuminate\Http\Request;

class ResellerProductController extends Controller
{
    public function index(){
        $products = ResellerProducts::with('products')->where('user_id',auth()->user()->id)->get();
        dd($products);
        return view('reseller.reseller_products.index');
    }
}
