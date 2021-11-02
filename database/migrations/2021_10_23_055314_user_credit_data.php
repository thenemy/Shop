<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserCreditData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('user_credit_data', function (Blueprint $table) {
            $table->foreignId('id')->unique()->constrained('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('name');
            $table->string('password');
            $table->string('phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_credit_data');
    }
}
