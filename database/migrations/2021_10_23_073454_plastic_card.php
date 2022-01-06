<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PlasticCard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plastic_card', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->timestamps();
            $table->string("transaction_id");
            $table->string("card_number");
            $table->string("expiry");
            $table->string("phone");
            $table->string("card_token"); //will be used
            $table->string("pan");/// see what are comming here
            ///  because maybe card number is not necessary
            $table->boolean("activated")->default(true); // true activated | false deactivated
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plastic_card');
    }
}
