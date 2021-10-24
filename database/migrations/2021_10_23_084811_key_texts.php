<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KeyTexts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('key_texts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('header_text_id')->constrained('header_texts')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('key_texts');
    }
}
