<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResellerProducts extends Model
{
    protected $table ='reseller_products';

    public function products(){
        return $this->hasOne('App\Product','id','product_id');
    }

    public function user(){
        return $this->belongsTo('App/User','id','user_id')
    }
}
