<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    // user purchased the products
    //

    /**
     * everything that was bought comes here.
     * here we must know how the order was bought whether it was taken
     * by credits, cash , or instance payment
     * where this product must be delivered
     *
     */
    public function up()
    {

        /**
         * 2147483647 = 1000000000
         * 1000000001
         * 1000000010
         * 1000000100
         * 1000001000
        */
        Schema::create('users_order', function (Blueprint $table) {
            $table->id();
            $table->foreignId("order_id")->constrained("orders");
            $table->smallInteger("status");
            $table->foreignId("user_id")->constrained("users")->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->unique(['order_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_users');
    }
}
