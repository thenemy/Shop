<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AvailableCities extends Migration
{
    /**
     * Run the migrations.
     * here we store all possible delivery cities
     * user for more thorough calculation of the price delivery
     * @return void
     */
    public function up()
    {
        Schema::create('available_cities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger("cityId")->unique()->index();
            $table->json("regionName");
            $table->string("cityCode");
            $table->json("cityName");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
