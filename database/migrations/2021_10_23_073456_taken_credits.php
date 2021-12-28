<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TakenCredits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // only products which was purchased can be taken to the credits
    public function up()
    {
        Schema::create('taken_credits', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('is_paid')->default(false);
            $table->bigInteger("transaction_id");
            $table->bigInteger('initial_price');
            $table->boolean("status")->default(false); /// accepted the credit or not is the important
            $table->dateTime('date_taken')->nullable();
            $table->dateTime('date_finish')->nullable();
//            $table->smallInteger("day_payment");// may be not necessary because it was need for
//            // recursion payment
//            $table->time("time_payment"); // from hh:mm:ss to HH:mm
            $table->foreignId("user_credit_data_id")
                ->constrained("user_credit_datas")
                ->restrictOnDelete();
            $table->foreignUuid("plastic_id")
                ->constrained("plastic_card")
                ->restrictOnDelete();
            $table->foreignId('surety_id')
                ->nullable()
                ->constrained("surety_data")
                ->restrictOnDelete()
                ->restrictOnUpdate();
            $table->foreignId('user_id')
                ->constrained('users')
                ->restrictOnUpdate()
                ->restrictOnDelete();
            $table->foreignId("credit_id")
                ->constrained("credits")
                ->restrictOnDelete();
            $table->foreignId("purchase_id")
                ->unique()->constrained("user_purchases")
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
        Schema::dropIfExists('taken_credits');
    }
}
