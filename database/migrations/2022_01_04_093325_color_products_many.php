<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ColorProductsMany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_products_many', function (Blueprint $table) {
            $table->id();
            $table->foreignId("color_product_id")
                ->constrained("color_products")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string("image");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('color_products_many');
    }
}
