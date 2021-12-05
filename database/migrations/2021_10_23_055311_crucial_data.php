<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrucialData extends Migration
{
    /**
     * Run the migrations.
     * for getting installment we need the crucial data
     * this data will be for user and surety
     * @return void
     */
    public function up()
    {
        Schema::create('crucial_data', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("firstname");
            $table->string("lastname");
            $table->string("father_name");
            $table->string("user_passport");// photo with passport
            $table->string('passport');
            $table->string('series');
            $table->string('pnfl');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crucial_data');
    }
}
