<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// not used for now
class FiltrationCategory extends Migration
{
    /**
     * Run the migrations.
     * will be used only for leaf of category
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filtration_category', function (Blueprint $table) {
            $table->id();
            $table->string("key");
            $table->integer('attribute');
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
        Schema::dropIfExists('filtration_category');
    }
}
