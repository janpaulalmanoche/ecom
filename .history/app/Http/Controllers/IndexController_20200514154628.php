<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\User;
use Session;
use Auth;
use DB;
use Illuminate\Http\Request;

class IndexController extends Controller
{//opening
    //
//display images and categories in our index file
    public function index(){
        $productsAll = Product::orderBy('id','DESC')->get();//get all the data from the products table through eloquent frrom descendingorder

            // $productsAll = Product::get();

        //get categories and sub categories
        $categories = ;
        //get all the main categories,parent id = 0
 //categories is our public function in our model.it is our relation name to get the parent_id
//->orderBy('name','ASC')
//  $categories_menu ="";
//        foreach($categories as $cat){//we rename our categories as cat
//            $categories_menu .=" <div class='panel-heading'>
//                             <h4 class='panel-title'>
//                         <a data-toggle='collapse' data-parent='#accordian' href='#".$cat->id."'>
//                                  <span class='badge pull-right'><i class='fa fa-plus'></i></span>
//                                            ".$cat->name."
//                                    </a>
//                                </h4>
//                            </div>
//                            <div id='".$cat->id."' class='panel-collapse collapse'>
//                                    <div class=\'panel-body\'>
//                                        <ul>";
//                        $sub_categories = Category::where(['parent_id'=>$cat->id])->get();//subcategories is equals where parent_id = $categories id
//                            foreach($sub_categories as $subcat){
//                                $categories_menu .=" <li><a href='".$subcat->url."'>
//                                                                    ".$subcat->name."
//                                                                        </a>
//                                                                    </li>";
//                            }
//                                    $categories_menu .=" </ul>
//
//                                        <!--end sub tag -->
//                                        </div>
//                                        </div>
//                                ";

        $getSessionID =  $session_id = Session::get('session_id');
        $countProductsinCart = DB::table('carts')->where('session_id' ,$getSessionID)->get()->count();




        return view('index')->with(compact('productsAll','categories','countProductsinCart'));//and passing the variable name tht gets the data of products to index page
    }

}//end

