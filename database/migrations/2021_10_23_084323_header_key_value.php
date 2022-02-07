<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HeaderKeyValue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('header_key_value', function (Blueprint $table) {
            $table->id();
            $table->foreignId("header_product_id")
                ->constrained("header_product")
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->json('key');
            $table->json("value");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('header_key_value');
    }
}
