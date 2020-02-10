<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameSkuColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products_attributes', function (Blueprint $table) {
            //
            $table->renameColumn('sku', 'product_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products_attributes', function (Blueprint $table) {
            //
            $table->renameColumn('product_code', 'sku');
        });
    }
}
