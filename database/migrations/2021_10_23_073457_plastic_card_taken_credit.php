<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PlasticCardTakenCredit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plastic_card_taken_credit', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('plastic_id')
                ->constrained("plastic_card")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId("taken_credit_id")
                ->constrained("taken_credits")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plastic_card_taken_credit');
    }
}
