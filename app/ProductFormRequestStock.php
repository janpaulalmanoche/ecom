<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductFormRequestStock extends Model
{
    //


    public function supplierR(){

        return $this->hasMany('App\Supplier','id', 'supplier_id');//order_id can be found on our OrderProduct tbl
    }

    public function productsR(){

        return $this->hasMany('App\Product','id', 'product_id');//order_id can be found on our OrderProduct tbl
    }

    public function productsS(){

        return $this->hasOne('App\Product','id', 'product_id');//order_id can be found on our OrderProduct tbl
    }

    public function supplierRS(){

        return $this->hasOne('App\Supplier','id', 'supplier_id');//order_id can be found on our OrderProduct tbl
    }



}
