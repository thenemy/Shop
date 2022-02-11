<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserPurchases extends Migration
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
     * by credits, cash, or instance payment
     * where this product must be delivered
     *
     *  orderNumberInternal will be generated id + shop_address_id
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
        Schema::create('user_purchases', function (Blueprint $table) {
            $table->unsignedBigInteger("id")->primary();/*this id will be generated automatically from 100000 */
            $table->timestamps();
            $table->smallInteger("status");
            $table->foreignId("user_id")->constrained("users")->onDelete('CASCADE')->onUpdate('CASCADE');
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
