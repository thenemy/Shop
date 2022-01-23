<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PaymentCard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_card', function (Blueprint $table) {
            $table->foreignId("payment_id")
                ->primary()
                ->constrained("payments")
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->timestamps();
            $table->bigInteger("transaction_id")->nullable();

            $table->foreignUuid("plastic_id")
                ->constrained("plastic_card")
                ->cascadeOnUpdate()
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
        Schema::dropIfExists('payment_card');
    }
}
