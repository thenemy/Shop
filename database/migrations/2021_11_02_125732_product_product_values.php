<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductProductValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_product_values', function (Blueprint $table) {
            $table->foreignId("product_value_id")->constrained("product_values");
            $table->foreignId("product_id")->constrained("products");
            $table->primary(["product_id", "product_value_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_product_values');
    }
}
