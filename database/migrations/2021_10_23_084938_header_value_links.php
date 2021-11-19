<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HeaderValueLinks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('header_value_links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('header_key_text_id')->constrained('header_key_texts')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->json('text');
            $table->string('link');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('value_links');
    }
}
