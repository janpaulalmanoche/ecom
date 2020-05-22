<?php

namespace App\Http\Controllers;

use App\Product;
use App\ResellerProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResellerProductApiContolller extends Controller
{
    public function __construct()
    {
        $this->product = new Product;
        $this->reseller_product = new ResellerProducts();
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
            'product_id' => 'required|integer'
        ]);

        $check_if_reseller_product_exist = ResellerProducts::
             where('product_id',$request->product_id)->where('user_id',2
             ->count();
             
        // $check_
        $save = $this->reseller_product;
        $save->product_id = $request->product_id;
        $save->user_id = Auth::user()->id;
        $save->save();

        return response($check_if_reseller_product_exist);
        
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
