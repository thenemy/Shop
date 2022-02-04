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
            $table->bigInteger("transaction_id")->nullable();
            $table->unsignedDecimal('initial_price', 50)->default(0);
            $table->integer("status")->default(\App\Domain\Installment\Interfaces\PurchaseStatus::WAIT_ANSWER);
            $table->dateTime('date_taken')->nullable();
            $table->dateTime('date_finish')->nullable();
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
