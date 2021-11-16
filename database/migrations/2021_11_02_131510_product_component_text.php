<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductComponentText extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_component_text', function (Blueprint $table) {
            $table->foreignId("text_component_id")->constrained("text_components");
            $table->foreignId("product_id")->constrained("products");
            $table->primary(["product_id", "text_component_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_component_text');
    }
}
