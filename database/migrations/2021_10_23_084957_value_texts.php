<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ValueTexts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('value_texts', function (Blueprint $table) {
            $table->foreignId('key_text_id')->primary()->constrained('key_text')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('value_texts');
    }
}
