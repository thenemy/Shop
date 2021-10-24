<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Credits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credits', function (Blueprint $table) {
//            $table->id();
//            $table->bigInteger('initial_price');
//            $table->timestamp('date_taken');
//            $table->foreignId('users_id')->constrained('users')->onUpdate('CASCADE')->onDelete('CASCADE');
//            $table->foreignId('products_id')->constrained('products')->onUpdate('CASCADE')->onDelete('CASCADE');
//            $table->boolean('isPaid');
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credits');
    }
}
