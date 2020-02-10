<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Measurement;
use App\Order;
use App\OrderProduct;
use App\ProductsAttribute;
use App\User;
use Intervention\Image\ImageManagerStatic;
use Image;
use App\Category;
use App\Product;

//for image
use Illuminate\Support\Facades\Input;
use phpDocumentor\Reflection\Types\Null_;
use Session;
use Auth;
use DB;



class FrontEndDisplayProductsController extends Controller
{
    //
    // when you click the subcat and the main cat
//display all prod via Main cat or Sub cat
    public function products($url = null){

        //404 page
        $countCategory = Category::where(['url' => $url,'status'=>1])->count();//check if the url is = to $url and count is ture =1 if not = 0
        if($countCategory ==0){
            abort(404);//reserve word
        }

        //get all main categories categories
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();

        $categoryDetails = Category::where(['url'=>$url])->first();//we are getting the url of the category
        //get all su categories categories
        if($categoryDetails->parent_id==0){
            //if url is equal to main cat
            //if the parent_id of cat is = equals or the same to the id,it will get the category name of it
            $subCategories = Category::where(['parent_id'=>$categoryDetails->id])->get();

            foreach($subCategories as $subcat){
                $cat_id[] =$subcat->id;
            }
            //echo $cat_id; die;
            $productsAll = Product::whereIn('category_id' , $cat_id)->get();
            //here prodcutsAll value is equal to all products where product category_id is equalt to
            //cat_id variable that is equal to $subcat or $subCategories where in category table
            // //parent_id of category name is = equals or the same to the id

        }
        else{
            //if url is equal to subcategoey
            //desplays product where prodduct category id is equal to id in category table
            $productsAll = Product::where(['category_id' =>$categoryDetails->id])->get();
            //selecting all products table value that has category_id is equal to category tables id
            //getting the main category here
        }



        $getSessionID =  $session_id = Session::get('session_id');
        $countProductsinCart = DB::table('carts')->where('session_id' ,$getSessionID)->get()->count();
        //in our blade file php,we dont need to edit some code,because the sorting of products is done here
        //$productsAll = Product::where(['category_id' =>$categoryDetails->id])->get();
        return view('products.ProductListViaCatSubcat')->with(compact('categoryDetails','productsAll','categories','countProductsinCart'));
        /* original code
       //get all categories and sub categories
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();


    $categoryDetails = Category::where(['url'=>$url])->first();//we are getting the url of the category

//desplays product where prodduct category id is equal to id in category table
    $productsAll = Product::where(['category_id' =>$categoryDetails->id])->get();
    //selecting all products table value that has category_id is equal to category tables id
        //getting the main category here

        //in our blade file php,we dont need to edit some code,because the sorting of products is done here
        //$productsAll = Product::where(['category_id' =>$categoryDetails->id])->get();
    return view('products.listing')->with(compact('categoryDetails','productsAll','categories'));
*/
    }


//is the details of the product when you clock the image
    public function ProductDetail($id = null){

        $countCategory = Product::where(['id' => $id])->count();//check if the url is = to $url and count is ture =1 if not = 0
        if($countCategory ==0){
            abort(404);//reserve word
        }


        //get the product datas where id is equal to the parameter or var id that is pass
        $productdetails = Product::where(['id'=>$id])->first();
        //  $productdetails = Product::with('attributes')->where(['id'=>$id])->first();
        //product with relation that each product has many product attributes ,where id is equal tovar id


        //for the recomended items
        $relatedProducts = Product::where('id', '!=' ,$id)->where(['category_id'=>$productdetails->category_id])->get();
        //where product id is not equal to var id so it wont show the selected item into the recomended items and
        // and where product category_id is equal to $productdetails category_id still in product table

        //for recomended items for other sizes

//        $forOtherSIzes=Product::where('id' ,$id)->get();
//     foreach($forOtherSIzes as $othersizes){
//        $getID= $othersizes->id;
//        $AttributteTable= ProductsAttribute::where('product_id',$getID)->get();
//
////        echo"<pre>"; print_r($AttributteTable);die;
//     }

        //for toher sizes
        $AttributteTable = Product::where('id', '!=' ,$id)->where(['product_name'=>$productdetails->product_name])->get();

        //get all main categories categories
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();

        //     $total_stock = ProductsAttribute::where('product_id',$id)->sum('stock');
//        $total_stock = ProductsAttribute::where('product_id',$id)->sum('stock');
        $total_stock = Product::where('id',$id)->sum('stock');

        $getSessionID =  $session_id = Session::get('session_id');
        $countProductsinCart = DB::table('carts')->where('session_id' ,$getSessionID)->get()->count();

        return view('products.detail')->with(compact('productdetails','categories','total_stock','relatedProducts','AttributteTable','countProductsinCart'));

    }


}
