<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class City2id extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('available_cities', function (Blueprint $table) {
            $table->dropColumn("cityId");
            $table->dropColumn("regionCode");
        });
        Schema::table('available_cities', function (Blueprint $table) {
            $table->bigInteger("cityId")->unique()->index();
            $table->bigInteger("regionCode");
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
