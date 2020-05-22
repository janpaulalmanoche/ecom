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
       $resellers = $this->reseller_product_model->where('product_id',$product_id)->get();
      
       return view('users.reseller.product_resellers');
    }
}
