<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MarkShop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mark_shop', function (Blueprint $table) {
            $table->foreignId("user_id")->constrained("users");
            $table->foreignId("shop_id")->constrained("users");
            $table->smallInteger("mark");
            $table->primary(["user_id", "shop_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mark_shop');
    }
}
