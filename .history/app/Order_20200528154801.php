<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderProducts;

class Order extends Model
{
    //
    public function ordersz(){
        return $this->hasMany('App\OrderProducts','id','order_id');//order_id can be found on our OrderProduct tbl
    }

    function product() {
        return $this->hasOne('App\Product');
    }

    public function try(){
        return 'test';
    }



    public function products()
    {
        return $this->belongsToMany('App\Product','order_products')
            ->withPivot('quantity','price','reseller_id');

    }
    public function users2()
    {
        return $this->belongsToMany(User::class);

    }

    public function user(){

        return $this->hasMany('App\User','id', 'user_id');//order_id can be found on our OrderProduct tbl
    }

    public function customer(){

        return $this->hasOne('App\User','id', 'user_id');
    }

    public function shipping(){
        return $this->hasOne('App\OrderShipping','order_id','id');
    }

}
