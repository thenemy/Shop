<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductCredits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_credits', function (Blueprint $table) {
            $table->id();
            $table->foreignId("product_id")->constrained("products")
                ->onDelete("CASCADE")
                ->onUpdate("CASCADE");;
            $table->foreignId("credit_id")->constrained("credits")
                ->onDelete("CASCADE")
                ->onUpdate("CASCADE");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_credits');
    }
}
