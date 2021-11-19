<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PlasticUserCards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("plastic_user_cards", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("card_token"); //will be used
            $table->string("pan");
            $table->boolean("activated"); // true activated | false deactivated
            $table->foreignId("user_id")->constrained("users")
                ->onDelete("CASCADE")
                ->onUpdate("CASCADE");
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
