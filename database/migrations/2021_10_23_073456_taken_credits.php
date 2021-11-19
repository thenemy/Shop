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
    public function up()
    {
        Schema::create('taken_credits', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('is_paid');
            $table->bigInteger('initial_price');
            $table->dateTime('date_taken');
            $table->dateTime('date_finish');
            $table->smallInteger("day_payment");
            $table->time("time_payment"); // from hh:mm:ss to HH:mm
            $table->foreignId("user_credit_data_id")->constrained("user_credit_datas")
                ->onDelete("restrict");
            $table->foreignUuid("plastic_id")->constrained("plastic_user_cards")
                ->onDelete("restrict");
            $table->foreignId("credit_id")->constrained("credits")->onDelete("restrict");
            $table->foreignId('order_id')->constrained('orders')->onUpdate('CASCADE')->onDelete('CASCADE');

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
