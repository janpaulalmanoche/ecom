<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
    
    public function reseller(){
        return $this->hasOne('App\Reseller','id','reseller_id');
    }
    
}
