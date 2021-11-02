<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductComponentImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_component_image', function (Blueprint $table) {
            $table->foreignId("image_component_id")->constrained("image_components");
            $table->foreignId("product_id")->constrained("products");
            $table->primary(["product_id", "image_component_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_component_image');
    }
}
