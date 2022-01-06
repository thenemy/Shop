<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PlasticUserCards extends Migration
{
    /**
     * Run the migrations
     * @return void
     */
    public function up()
    {
        Schema::create("plastic_user_cards", function (Blueprint $table) {
            $table->foreignUuid('plastic_id')
                ->constrained("plastic_card")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId("user_id")
                ->constrained("users")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->primary(['plastic_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
