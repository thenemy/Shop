<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Delivery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    /**
     *  get the price of the delivery
     *
     */
    /**
     * all data which was filled during ordering the payment will be copied here
     * because we want that all change the direction or send something other
     * because we can return the product
     * so the product _id will be the best choice
     * from the product_id we can get delivery_data_product
     * so we will be forced here only fill data from and data to
     */
    public function up()
    {
        Schema::create('delivery', function (Blueprint $table) {
            $table->id();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('installment_plans');
    }
}
