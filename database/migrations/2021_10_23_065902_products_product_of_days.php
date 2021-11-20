<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductsProductOfDays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_product_of_days', function (Blueprint $table) {
            $table->foreignId("product_of_day_id")->constrained("product_of_days")
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreignId("product_id")->constrained("products")
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->primary(['product_of_day_id','product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_product_of_days');
    }
}
