<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Country extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('available_cities', function (Blueprint $table) {
            $table->dropColumn("countryName");
            $table->dropColumn("cityName");
            $table->dropColumn("indexMin");
            $table->dropColumn("indexMax");
        });
        Schema::table('available_cities', function (Blueprint $table) {
            $table->json("countryName");
            $table->json("cityName");
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
        //
    }
}
