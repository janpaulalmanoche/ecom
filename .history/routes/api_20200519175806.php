<?php

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'reseller'], function () {
    Route::resource('products','ResellerAddProductApiController');
    Route::get('new-products/{user_id}','ResellerDashBoardController@new_orders');
    Route::get('profit/{user_id}','ResellerDashBoardController@netotal_profitw_orders');
     Route::get('orders/list/{user_id}','ResellerOrderController@new_orders');
     Route::get('orders/list/{user_id}/{date}','ResellerOrderController@order_by_date');

});

Route::group(['prefix' => 'admin'], function () {

    Route::resource('new-products','AdminDashboardController');
   

});


//for the students save
//Route::post('/students','ApiController@create');
//Route::get('/students','ApiController@index');
////to get the data using api
//Route::get('/students/{id}','ApiController@show');
//
////Route::get('/student/{id}','ApiController@showbyid');
//
//
////to update
//
//Route::put('/students/{id}','ApiController@update');
//
//Route::delete('/students/{id}','ApiController@destroy');

Route::apiResource('/students', 'ApiController');
