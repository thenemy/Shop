<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductOfDays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_of_days', function (Blueprint $table) {
            $table->foreignId("product_id")
                ->primary()
                ->constrained("products")
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->dateTime('start_time');
            $table->dateTime('end_time');
        });
    }
    /**
     * use trigger to remove product offer after 24 hours
     * BEGIN
     * DO SLEEP(<seconds>);
     * UPDATE ...;
     * END
     *
     */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_of_days');
    }
}
