<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeliveryAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * it is the actual location
     * product does not have to have location
     * pickUpDelivery
     * deliveryTo
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_address', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
//            $table->string("addressString")->nullable();// can be generated
            $table->string("index")->nullable(); /// required
            $table->string("street");
            $table->smallInteger("house")->nullable();
            $table->string('flat')->nullable();
            $table->text("instructions")->nullable(); //additional instructions for courier to get the product
            $table->foreignId("city_id")->constrained(
                "available_cities")
                ->restrictOnDelete()
                ->restrictOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery_address');
    }
}
