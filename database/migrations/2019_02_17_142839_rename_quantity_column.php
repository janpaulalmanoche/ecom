<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameQuantityColumn extends Migration
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
            $table->renameColumn('quantity', 'stocks_requested');
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
            $table->renameColumn('stocks_requested', 'quantity');
        });
    }
}
