<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MarkProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mark_product', function (Blueprint $table) {
            $table->foreignId("user_id")->constrained("users");
            $table->foreignId("product_id")->constrained("products");
            $table->smallInteger("mark");
            $table->primary(["user_id", "product_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mark_product');
    }
}
