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
            $table->foreignId("user_purchase_id") // from here we will get all relevant products
            ->constrained("user_purchases")
                ->restrictOnDelete()
                ->restrictOnDelete();
            $table->foreignId("shop_address_id") // this is needed for getting relevant products, and pick Up
            ->constrained("shop_addresses")
                ->restrictOnUpdate()
                ->restrictOnDelete();
            // Namely, some products have the same pick up address , so we have to put them together
            $table->string("orderNum")->nullable();
            $table->string("datePickup");
            $table->integer("status")->default(\App\Domain\Delivery\Interfaces\DeliveryStatus::CREATED); //// all status that possible for delivery

            $table->primary(['user_purchase_id', "shop_address_id"]);
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
