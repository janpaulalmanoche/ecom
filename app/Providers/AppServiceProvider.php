<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;// to fix
//Illuminate\Database\QueryException  : SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long;
// max key length is 767 bytes (SQL: alter table
//`users` add unique `users_email_unique`(`email`))

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191); // and this one
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
