<?php

namespace App\Http\Controllers;

use App\Cart;
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


class CartController extends Controller
{
    //add to cart/we are adding each item to the db that was added to the cart
    public function addtocart(Request $request){
        $data = $request->all();
        dd($data);
        if(empty(Auth::User()->email)){//to get rid of errors whenyou dont have a value
            $data['user_email'] = '';
        }else{
            $data['user_email'] = Auth::User()->email;
        }
//
//        $session_id = Session::get('session_id');
//        if(empty($session_id)){//if session id is empty then make only one session id so in every product added there is only one session id
//            $session_id= str_random(40);// to give session id a random value
//            Session::put('session_id','$session_id');//make session_id a session
//        }

        $session_id = Session::get('session_id');
        if(empty($session_id)){
            $session_id = str_random(40);
            Session::put('session_id',$session_id);
        }
        //check if the product already exist in the db cart to avoid duplication of data, important is the
        //product name size mesuremend and the session id
        $countProducts=  Cart::with('cartprod')
            ->where(['reseller_product_id'=>$data['reseller_product_id'],
//            'product_name'=>$data['product_name'],
//            'product_code'=>$data['product_code'],
//            'product_brand'=>$data['product_brand'],
//            'size'=> $data['size'],
//            'measurement'=> $data['measurement'],
//            'price'=>$data['product_price'],
            'session_id'=>$session_id])->count();

        if($countProducts>0){//so if count if greater than 0, that means the records already exist,so we should not save it again
            return redirect()->back()->with('flash_message_error','product already exist to cart!');

        }else{//else if countProdcuts is less than 0, we will save it cause it doesnt exist,but still base on the session id
            // DB::table('cart')->insert we are using this one cause we dont have a model
            //        $sizeArr = explode("-",$data['size']);//explode to remove

            DB::table('carts')->insert
            (['reseller_product_id'=>$data['reseller_product_id'],
                'price'=>$data['product_price'],
                'user_email'=>$data['user_email'],
                'session_id'=>$session_id,
                'quantity'=> 1 ]);
        }
        return redirect('cart')->with('flash_message_success','product has been added in cart!');

    }



    public function addtocartFromIndex(Request $request){
        $data = $request->all();
      

        // dd($data);

        if(empty(Auth::User()->email)){//to get rid of errors whenyou dont have a value
            $data['user_email'] = '';
        }else{
            $data['user_email'] = Auth::User()->email;
        }
//
//        $session_id = Session::get('session_id');
//        if(empty($session_id)){//if session id is empty then make only one session id so in every product added there is only one session id
//            $session_id= str_random(40);// to give session id a random value
//            Session::put('session_id','$session_id');//make session_id a session
//        }

        $session_id = Session::get('session_id');
        if(empty($session_id)){
            $session_id = str_random(40);
            Session::put('session_id',$session_id);
        }
        //check if the product already exist in the db cart to avoid duplication of data, important is the
        //product name size mesuremend and the session id
        $countProducts=   DB::table('carts')->where(['reseller_product_id'=>$data['reseller_product_id'],
            'session_id'=>$session_id])
            ->count();

        if($countProducts > 0){//so if count if greater than 0, that means the records already exist,so we should not save it again
            return redirect('/product/'.$data['reseller_product_id'])->with('flash_message_error','product already exist to cart!');

        }else{//else if countProdcuts is less than 0, we will save it cause it doesnt exist,but still base on the session id
            // DB::table('cart')->insert we are using this one cause we dont have a model
            //        $sizeArr = explode("-",$data['size']);//explode to remove
            DB::table('carts')->insert(
                ['reseller_product_id'=>$data['reseller_product_id'],
                'product_id'=>$data['product_id'],
                'reseller_id'=>$data['reseller_id'],
                'resell_price'=>$data['resell_price'],
                'user_email'=>$data['user_email'],
                'session_id'=>$session_id,
                'quantity'=> 1 ]);
        return redirect('/');
        }


        return view('/');
    }




    public function addtocartjquery(){

    }

//sesion id is the one who lets you add items to the cart even you were not log in or registered in to the site,
    public function cartp(){
        //for the cart page
        //get all products in cart table base on session_id

        $session_id =Session::get('session_id');//get the session id we created in public function addtocart

        $userCart= Cart::where(['session_id'=>$session_id])->get();
        $total= Cart::where(['session_id'=>$session_id])->sum('resell_price');
        // dd($userCart);
//         echo"<pre>";print_r($userCart);die;

        //get image
//        foreach( $userCart as $key => $product){
//            $productDetails= Product::with('cartR')->where('id', $product->product_id)->first();//compare the two id 'id', $product->product_id
//            //we are getting the image from the producttaable with the id same to cart prodcut_id
//            $userCart[$key]->image= $productDetails->image;
//        }


        $getSessionID =  $session_id = Session::get('session_id');
        $countProductsinCart = DB::table('carts')->where('session_id' ,$getSessionID)->get()->count();

        return view('products.cart')->with(compact('userCart','countProductsinCart','total'));
    }

    public function select_payment(Request $request){
        $session_id =Session::get('session_id');

        $userCart= Cart::where(['session_id'=>$session_id])->get();
        $total= Cart::where(['session_id'=>$session_id])->sum('resell_price');
  

        $getSessionID =  $session_id = Session::get('session_id');
        $countProductsinCart = DB::table('carts')->where('session_id' ,$getSessionID)->get()->count();
        if($request->method('post')){
            return redirect('/generate-code');
        }

        return view('products.select_payment')->with(compact('userCart','countProductsinCart','total'));
    }

    //on cartp
    public function MinusQtytoStocks(Request $request){

        $data=$request->all();

        $session_id =Session::get('session_id');//get the session id we created in public function addtocart

        $userCartt=Cart::where(['session_id'=>$session_id])->get();

        foreach($userCartt as $try){
            $userProduct= $try->product_id;
            $userProduct2= $try->quantity;
            DB::table('products')->where('id',$userProduct)->decrement('stock',$userProduct2);
        }

        //
        //its working fine now.we can pluck anything in the function with get() methood ***!!!!!!!****!!!
        //$userCartt=DB::table('cart')->where(['session_id'=>$session_id])->get(); //first is we have this function,
        //we are getting the products in the cart table where the session_id column is equal to the present session_id

//        foreach($userCartt as $try){ // we put it into foreach,because the rpducts can be one to many so we need to loop
        //we just rename the userCartt as try
//            $userProduct= $try->product_id; // this is the way to pluck some column name inside the function with get() method
//            $userProduct2= $try->quantity;//
//            DB::table('products')->where('id',$userProduct)->decrement('stock',$userProduct2);
        //and we are able to decrement now, in table products, we match the id into the userProduct where we are getting the id
        //from the $try variable ,it is our function
        //and next is decrement the stock from $userProduct2 were we are plucking the quantity
//        }

        return redirect('/checkout');
    }



    public function deleteCartProduct($id = null){
        DB::table('carts')->where('id',$id)->delete();
        return redirect('/cart')->with('flash_message_success','Product has beem remove from the cart');
        //return redirect is equal to web.php url routes
    }
    public function updateCartQuantity($id = null,$quantityy=null){
        //check products stock when the user increase the quantity
        //in our crt page, whwn you click the + or - we are passing the id from cart table, and we are comparing
        //the id from the cart to the id($id) that we are passing whe nyou click the + and -
        //matching them and get the data or information
        $getCartDetails = DB::table('carts')->where('id',$id)->first();

        //stock

        $getProductStock = Product::where('id',$getCartDetails->product_id)->first();
        //
        //
        //and now we are the getting the products data, matching the products table 'product_code'
        //to $getCartDetails where cart id is equal to the id we aer passing form then getting its product_code from cart tble
        $getProductStock->stock;//and now we are getting the stock of both tables

//     wrong way to subtract stock   $getproductid= $getCartDetails->product_id;

        $updated_quantity = $getCartDetails->quantity+$quantityy; //this is now the quantity that the user wants
        if($getProductStock->stock >=$updated_quantity){
            ////we are now comparing the stocks, the stocks from products should be greater or equal to the quantity the user wants
            //+
            DB::table('carts')->where('id',$id)->increment('quantity',$quantityy);//no need to update,well just have to increment

            //
            //in lararvel we have increment,to increase,and decrement to decrease, but you have to pass
            //the something like we do in here so you cann add or decrease
//            DB::table('products')->where('id',$getproductid)->decrement('stock',$quantityy);
            return redirect('/cart')->with('flash_message_success','Product quantity has updated');

            //  public function updateCartQuantity($id = null){
            // DB::table('cart')->where('id',$id)->increment('quantity',1);
            //we can use this one to increase only,but since we need to decrease,thats why we pass paramenters valu in our cart file like 1 and -1
            //+
        }else{
            return redirect('/cart')->with('flash_message_error','Required Product Quantity is not available');
        }
    }

}
