<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceHistory extends Model
{

    public function pro(){

        return $this->hasMany('App\Product','id','product_id');//id can be found on our products tble
    }

}
