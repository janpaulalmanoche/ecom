<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_shippings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->string('postal_code');
            $table->string('city');
            $table->string('baranggay');
            $table->string('street');
            $table->integer('phone_no');
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
        Schema::dropIfExists('order_shippings');
    }
}
