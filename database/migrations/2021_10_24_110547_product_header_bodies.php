<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductHeaderBodies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_header_bodies', function (Blueprint $table) {
            $table->foreignId('product_header_id')->constrained('product_headers')
                ->onUpdate("CASCADE")
                ->onDelete('CASCADE');
            $table->foreignId('product_id')->constrained('products')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('product_header_bodies');
    }
}
