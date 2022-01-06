<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserAddresses extends Migration
{
    /**
     * Run the migrations.
     * where to deliver the purchases
     * @return void
     */
    public function up()
    {
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId("delivery_address_id")
                ->unique()
                ->constrained("delivery_address");
            /**
             * no two same address could exist
             */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location');
    }
}
