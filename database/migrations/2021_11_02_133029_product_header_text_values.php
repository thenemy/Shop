<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductHeaderTextValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_header_text_values', function (Blueprint $table) {
            $table->foreignId("link_id")->constrained("header_value_links");
            $table->foreignId("product_id")->constrained("products");
            $table->primary(["product_id", "link_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_header_text_values');
    }
}
