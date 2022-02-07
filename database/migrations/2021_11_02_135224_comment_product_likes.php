<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CommentProductLikes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_product_likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId("comment_id")
                ->constrained("comment_product")
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId("user_id")
                ->constrained("users")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->boolean("status");//like(true) or dislike(false)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_product_likes');
    }
}
