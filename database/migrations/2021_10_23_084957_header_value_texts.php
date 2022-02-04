<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HeaderValueTexts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('header_value_texts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('header_key_text_id')
                ->constrained('header_key_texts')
                ->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId("product_id")
                ->constrained("products")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
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
