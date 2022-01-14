<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ShopAddresses extends Migration
{
    /**
     * Run the migrations
     * from delivery place
     * @return void
     */
    public function up()
    {
        Schema::create('shop_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->unique()
                ->constrained('users')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreignId("delivery_address_id") // for create order
            ->unique()
                ->constrained("delivery_address");
            $table->float("longitude");
            $table->float("latitude");
            $table->string("dinnerTimeFrom")->nullable();
            $table->string("dinnerTimeTo")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_addresses');
    }
}
