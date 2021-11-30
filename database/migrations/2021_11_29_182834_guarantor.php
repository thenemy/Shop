<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Guarantor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // guarantor will be for some user
        // so, it can be said that this plastic card is the card of the user
        // taken credit is the id of the credit
        Schema::create('guarantors', function (Blueprint $table) {
            $table->foreignUuid("plastic_id")
                ->constrained("plastic_user_cards")
                ->restrictOnDelete();
            $table->foreignId("taken_credit_id")
                ->constrained('taken_credits');
            $table->primary(['plastic_id', "taken_credit_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guerantor');
    }
}
