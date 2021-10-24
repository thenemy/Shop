<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_keys', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->primary()->constrained('products')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->json('text');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_key');
    }
}
