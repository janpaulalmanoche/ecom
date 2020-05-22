<?php

namespace App;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    // public function cartprod(){
    //     return $this->hasMany('App\Product','id','product_id');//order_id can be found on our OrderProduct tbl
    // }


    public function reseller(){
        return $this->belongsTo('App\User','id','user_id');
    }
    public function reseller_product(){
        return $this->hasMany('App\ResellerProducts','id','product_id');
    }
}
