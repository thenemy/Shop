<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductKeysProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_keys_product', function (Blueprint $table) {
            $table->id();
                $table->foreignId('products_key_id')
                ->constrained('product_keys')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId("product_id")
                ->constrained("products")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->unique(['products_key_id', 'product_id']);
            $table->index(['products_key_id', "product_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_keys_product');
    }
}
