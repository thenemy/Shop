<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SuretyData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surety_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreignId("crucial_data_id")
                ->constrained("crucial_data")
                ->restrictOnUpdate()
                ->restrictOnDelete();
            $table->string("phone");
            $table->string("additional_phone");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surety_data');
    }
}
