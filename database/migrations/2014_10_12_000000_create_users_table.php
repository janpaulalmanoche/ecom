<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('f_name');
            $table->string('m_name');
            $table->string('l_name');
        //    $table->string('admin');
            $table->string('email')->unique();
            $table->integer('type_id');
            $table->string('password');
            $table->string('street')->nullable();
            $table->string('baranggay')->nullable();
            $table->string('city')->nullable();
            $table->string('mobile')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
