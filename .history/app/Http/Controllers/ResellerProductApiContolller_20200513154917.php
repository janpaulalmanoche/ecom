<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ResellerProductApiContolller extends Controller
{
    public function __construct()
    {
        $this->model = new Product;
    }
    

    public function index()
    {

        $product = $this->model->with('category')->get();
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
        //
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
