<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStocksDelivetedToProductFormRequestStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_form_request_stocks', function (Blueprint $table) {
            //

            $table->integer('stocks_delivered')->after('quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_form_request_stocks', function (Blueprint $table) {
            $table->integer('stocks_delivered');
        });
    }
}
