<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
    protected $table= "order_products";
    
    public function reseller(){
        return $this->hasOne('App\User','id','reseller_id');
    }
    
    public function product(){
        return $this->belongsTo('App\Product','product_id','id');
    }

    public function order(){
        return $this->belongsTo('App\Order','order_id','id');
    }
}
