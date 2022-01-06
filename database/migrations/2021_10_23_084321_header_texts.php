<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//at first will check if Header is exist
// if exist will check if key exists
// if exists will check if value exist
// if exists will create value add many to many relationship
// If any of them not exists new row will be created for this value

//retrieve go to many to many get all values which are in the table
// then join this values with appropriate key by using id
// and repeat

// check if the same key does not appear twice in table
// and in that table we do not have key with two different value
class HeaderTexts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('header_texts', function (Blueprint $table) {
            $table->id();
            $table->json('text');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('header_texts');
    }
}
