<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WorkTimes extends Migration
{
    /**
     * Run the migrations.
     * period when we are able to get the purchases products
     * @return void
     */
    public function up()
    {
        Schema::create('work_times', function (Blueprint $table) {
            $table->id();
            $table->foreignId("shop_address_id")
                ->constrained("shop_addresses")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->integer("day"); // from 1 to 7
            $table->integer("workTimeFrom"); // 0 to 24
            $table->integer("workTimeTo"); // 0 to 24
            $table->index(['shop_address_id', 'day']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_times');
    }
}
