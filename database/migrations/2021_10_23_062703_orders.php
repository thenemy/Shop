<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    /**
     *   can be added the status of the product
     *
     *  added to basket
     *  purchased
     *  in payment
     *  failed
     *
     */
    public function up()
    {
        /**
         * order will contain all required infromation about the product
         *  not about how this product wiil be served by our service
         *  so it will give what the color of the product
         *  how many the similiar product wanted to buy
         *  but not anything about the transaction
         */
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('quantity');
            $table->json('order');
            $table->integer('price'); /// calculated price
            $table->foreignId("product_id")->constrained("products");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
