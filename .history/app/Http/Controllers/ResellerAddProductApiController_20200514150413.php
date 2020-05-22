<?php

namespace App\Http\Controllers;

use App\Product;
use App\ResellerProducts;
use Illuminate\Http\Request;

class ResellerAddProductApiController extends Controller
{
    public function __construct()
    {
        $this->product = new Product;
        $this->reseller_product = new ResellerProducts;
    }
    

    public function index()
    {
        
        $product = $this->product->with('category')->where('stock' ,'!=',0)->get();
        $product->map(function($products){
            return $products->image_path = '/images/backend_images/products/small/'.$products->image;
        });
        return response()->json($product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'product_id' => 'required|integer',
            'user_id' => 'required',
            'resell_price' => 'required|integer'
        ]);
            
        $product = $this->product->find($request->product_id);

    
        $check_if_reseller_product_exist = ResellerProducts::
             where('product_id',$request->product_id)->where('user_id',$request->user_id)
             ->count();
             
        if($check_if_reseller_product_exist >= 1){
            return response('this product is already in your list')->setStatusCode(401);
        }
        
        if($request->resell_price < $product->price ){
            return response('You cant resell the product lower than the original price')->setStatusCode(401);
        }
        
        $save = $this->reseller_product;
        $save->product_id = $request->product_id;
        $save->user_id = $request->user_id;
        $save->resell_price = $request->resell_price;
        $save->save();

        return response($save);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
