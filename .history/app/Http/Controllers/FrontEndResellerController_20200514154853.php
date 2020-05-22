<?php

namespace App\Http\Controllers;

use App\Product;
use App\Repositories\CategoryRepository;
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
      
       $productsAll = Product::orderBy('id','DESC')->get();//get all the data from the products table through eloquent frrom descendingorder

        

       $category_repo = new CategoryRepository();
       $categories = $category_repo->index();
   
       $getSessionID =  $session_id = Session::get('session_id');
       $countProductsinCart = DB::table('carts')->where('session_id' ,$getSessionID)->get()->count();




       return view('users.reseller.product_resellers',compact('resellers'));
    }
}
