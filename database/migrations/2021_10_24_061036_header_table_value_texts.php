<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HeaderTableValueTexts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('header_table_value_texts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('header_table_key_text_id')->constrained('header_table_key_texts')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
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
        Schema::dropIfExists('header_table_value_texts');
    }
}
