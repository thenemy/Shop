<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FiltrationKeyCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('filtration_key_category', function (Blueprint $table) {
            $table->id();
            $table->foreignId("product_key_id")
                ->constrained("product_keys")
                ->restrictOnDelete()
                ->restrictOnUpdate();
            $table->foreignId("category_id")
                ->constrained("categories")
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filtration_key_category');
    }
}
