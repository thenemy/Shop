<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CommentProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_product', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId("user_id")->constrained("users")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId("product_id")->constrained("products")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->boolean("status")->default(false); // published or not
            $table->string("message");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_product');
    }
}
