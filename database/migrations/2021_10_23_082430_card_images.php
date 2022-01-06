<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CardImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_images', function (Blueprint $table) {
            $table->foreignId('product_id')->primary()->constrained('products')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('image')->default("");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('card_images');
    }
}
