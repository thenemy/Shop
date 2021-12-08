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
     *  after we create the order we will save order number here
     * to make other operation about the delivery
     */
    public function up()
    {
        Schema::create('delivery', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_purchase_id")
                ->constrained("user_purchases")
                ->restrictOnDelete()
                ->restrictOnDelete();
            $table->string("orderNum");
            $table->integer("status"); //// all status that possible for delivery
            ///
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
