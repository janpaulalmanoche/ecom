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
     

        return view('index')->with(compact('productsAll','categories','countProductsinCart'));//and passing the variable name tht gets the data of products to index page
    }

}//end

