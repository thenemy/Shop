<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->bigInteger('price');
            $table->smallInteger("currency");
            $table->integer("number");
            $table->integer("weight");// weight in kg
            $table->boolean("is_important")->default(false);
            $table->string("slug")->unique();
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('shop_id')->constrained('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
