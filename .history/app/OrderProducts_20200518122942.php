<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
    
    public function reseller(){
        return $this->belongsTo('App\Reseller','reseller_id','id');
    }
    
}
