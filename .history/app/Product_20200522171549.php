<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function attributes(){
        return $this->hasMany('App\ProductsAttribute','product_id');
            //product has one to many attribute, foreign key is the product_id
        // we use product_id even we dont have product_id name om our tbale because
        //laravel will get the name of the owning model and suffix it with id
        //so the FK will be the model name with id (product_id)
    }

//
////    public function ord(){
////        return $this->hasMany('App\OrderProduct','product_id');//product_id can be found on our OrderProduct tbl
////    }
//
    public function cartR(){
    return $this->hasMany(Permission::class,'product_id');
    }
//
//    public function hehe(){
//        return $this->hasMany('App\OrderProduct','product_id');
//    }
//    //php artisan make:model Permission


    public function orders()
    {
        return $this->belongsToMany(Order::class,'order_products');

    }
    public function zz(){
        return $this->hasMany('App\Cart','product_id');

    }

    public function category(){
        return $this->hasOne('App\Category','id','category_id');
    }
//

    public function reseller_product(){
        return $this->hasMany('App\ResellerProduct','product_id','id');
    }

    //stack overflow
}
