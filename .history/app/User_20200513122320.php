<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function userss(){
        return $this->hasMany('App\Order','user_id');
        //product has one to many attribute, foreign key is the product_id
        // we use product_id even we dont have product_id name om our tbale because
        //laravel will get the name of the owning model and suffix it with id
        //so the FK will be the model name with id (product_id)
    }

    public function orders2()
    {
        return $this->belongsToMany(Order::class);
    }

    public function type(){

        return $this->hasOne('App\Type','type_id','id');
    }



}
