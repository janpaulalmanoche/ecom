<?php

namespace App\Http\Controllers;

use App\Product;
use App\Repositories\CategoryRepository;
use App\ResellerProducts;
use Session;
use Illuminate\Http\Request;
use DB;

class FrontEndResellerController extends Controller
{
    public function __construct()
    {
        $this->reseller_product_model = new ResellerProducts;
    }
    public function show($product_id){
      
       $productsAll =  $this->reseller_product_model->where('product_id',$product_id)->orderBy('id','DESC')->get();

       $category_repo = new CategoryRepository();
       $categories = $category_repo->index();
   
       $getSessionID =  $session_id = Session::get('session_id');
       $countProductsinCart = DB::table('carts')->where('session_id' ,$getSessionID)->get()->count();


       return view('users.reseller.product_resellers',compact('productsAll','categories','countProductsinCart'));
    }
}
