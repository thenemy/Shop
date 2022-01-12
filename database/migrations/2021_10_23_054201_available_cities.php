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
                $table->string("countryCode")->index();
                $table->json("countryName");
            $table->bigInteger("regionCode");
            $table->string("regionName");
            $table->string("cityCode");
            $table->json("cityName");
            $table->string("abbreviation");
            $table->string("indexMin")->nullable();
            $table->string("indexMax")->nullable();
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
