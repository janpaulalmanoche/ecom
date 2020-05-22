<?php

namespace App\Http\Controllers;

use App\ResellerProducts;
use Illuminate\Http\Request;

class FrontEndResellerController extends Controller
{
    public function __construct()
    {
        $this->reseller_product_model = new ResellerProducts;
    }
    public function show($product_id){
        dd($product_id);
    }
}
