<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TakenCreditError extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taken_credit_error', function (Blueprint $table) {
            $table->foreignId("id")->primary()
                ->constrained('taken_credits')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->json("reason");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taken_credit_error');
    }
}
