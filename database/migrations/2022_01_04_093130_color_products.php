<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ColorProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId("color_id")->constrained("colors")
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignId("product_id")->constrained("products")
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
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
        Schema::dropIfExists('color_products');
    }
}
