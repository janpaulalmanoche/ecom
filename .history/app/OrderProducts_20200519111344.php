<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
    
    public function reseller(){
        return $this->hasMany('App\User','id','reseller_id');
    }
    
    public function product(){
        return $this->belongsTo('App\Product','product_id','id');
    }
}
