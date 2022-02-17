<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_infos', function (Blueprint $table) {
            $table->foreignId('id')->primary()->constrained('products')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->bigInteger('views_num')->default(0);
            $table->bigInteger('favourites_num')->default(0);
            $table->bigInteger('purchased_num')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_infos');
    }
}
