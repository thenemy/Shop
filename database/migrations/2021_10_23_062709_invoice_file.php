<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InvoiceFile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_file', function (Blueprint $table) {
            $table->foreignId("user_purchase_id") // from here we will get all relevant products
            ->constrained("user_purchases")
                ->restrictOnDelete()
                ->restrictOnDelete();
            $table->foreignId("shop_id") // this is needed for getting relevant products, and pick Up
            ->constrained("shops")
                ->restrictOnUpdate()
                ->restrictOnDelete();
            $table->string("file");
            $table->primary(['user_purchase_id', "shop_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_file');
    }
}
