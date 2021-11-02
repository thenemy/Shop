<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductHeaderText extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_header_text', function (Blueprint $table) {
            $table->foreignId("header_value_text_id")->constrained("header_value_texts");
            $table->foreignId("product_id")->constrained("products");
            $table->primary(["product_id", "header_value_text_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('header_text_value_product');
    }
}
