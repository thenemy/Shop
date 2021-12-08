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
            $table->string("firstname")->default("");
            $table->string("lastname")->default("");
            $table->string("father_name")->default("");
            $table->date('date_of_birth')->nullable();
            $table->string("user_passport")->default("");// photo with passport
            $table->string("passport_reverse")->default("");
            $table->string('passport')->default("");
            $table->string('series')->default("");
            $table->string('pnfl')->default("");
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
