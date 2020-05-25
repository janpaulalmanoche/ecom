<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Repositories\CategoryRepository;
use App\User;
use Session;
use Auth;
use DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class IndexController extends Controller
{//opening
    //
//display images and categories in our index file
    public function index(){
        $productsAll = Product::
        whereHas('comments', function (Builder $query) {
            $query->where('content', 'like', 'foo%');
        })
        ->orderBy('id','DESC')->get();//get all the data from the products table through eloquent frrom descendingorder

        

        $category_repo = new CategoryRepository();
        $categories = $category_repo->index();
    
        $getSessionID =  $session_id = Session::get('session_id');
        $countProductsinCart = DB::table('carts')->where('session_id' ,$getSessionID)->get()->count();




        return view('index')->with(compact('productsAll','categories','countProductsinCart'));//and passing the variable name tht gets the data of products to index page
    }

}//end

