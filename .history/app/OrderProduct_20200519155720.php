<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    //
//    function product() {
//        return $this->hasMany('App\Product');
//    }
//    public function product()
//    {
//        return $this->hasMany('App\Product');
//    }

//    public function prod(){
//        return $this->hasMany('App\Product','id');//order_id can be found on our OrderProduct tbl\
//       //order_id can be found on our OrderProduct tbl
//    }
//    public function prod2()
//    {
//        return $this->hasMany('App\OrderProduct', 'id');
//
//    }
//
//
//    function product() {
//        return $this->hasMany('App\Order');
//    }
    public function product(){

        return $this->hasMany('App\Product','id', 'product_id');//order_id can be found on our OrderProduct tbl
    }

    public function usersx()
    {
        return $this->belongsToMany(User::class,'orders','id','user_id')
            ->withPivot('refference_number');

    }

    public function getorders(){

        return $this->hasMany('App\Order','id','order_id');//order_id can be found on our OrderProduct tbl
    }

    public function try(){
        return 'test';
    }



}
