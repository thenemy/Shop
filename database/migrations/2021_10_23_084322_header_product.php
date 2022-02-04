<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HeaderProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('header_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId("header_text_id")
                ->constrained("header_texts")
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId("product_id")
                ->constrained("products")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->unique(['header_text_id', 'product_id']);
            $table->index(['header_text_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('header_product');
    }
}
