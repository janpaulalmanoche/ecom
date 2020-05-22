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
      
       $productsAll = Product::orderBy('id','DESC')->get();//get all the data from the products table through eloquent frrom descendingorder

       // $productsAll = Product::get();

   //get categories and sub categories
   $categories = Category::with('categories')->orderBy('name','ASC')->where(['parent_id'=>0])->get();
   //get all the main categories,parent id = 0
//

   $getSessionID =  $session_id = Session::get('session_id');
   $countProductsinCart = DB::table('carts')->where('session_id' ,$getSessionID)->get()->count();





       return view('users.reseller.product_resellers',compact('resellers'));
    }
}
