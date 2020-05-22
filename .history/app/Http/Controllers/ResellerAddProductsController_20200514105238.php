<?php

namespace App\Http\Controllers;

use App\ResellerProducts;
use Illuminate\Http\Request;

class ResellerProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('test');
        return view('reseller.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\ResellerProducts  $resellerProducts
     * @return \Illuminate\Http\Response
     */
    public function show(ResellerProducts $resellerProducts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ResellerProducts  $resellerProducts
     * @return \Illuminate\Http\Response
     */
    public function edit(ResellerProducts $resellerProducts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ResellerProducts  $resellerProducts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResellerProducts $resellerProducts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ResellerProducts  $resellerProducts
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResellerProducts $resellerProducts)
    {
        //
    }
}
