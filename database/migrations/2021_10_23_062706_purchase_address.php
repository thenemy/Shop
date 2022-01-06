<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PurchaseAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_address', function (Blueprint $table) {
            $table->foreignId("user_purchase_id")
                ->primary()
                ->constrained("user_purchases")
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId("delivery_address_id")
                //*
                // who to deliver
                //*
                ->constrained('delivery_address')
                ->restrictOnUpdate()
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_address');
    }
}
