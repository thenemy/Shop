<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserAvatar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_avatar', function (Blueprint $table) {
            $table->foreignId('user_id')->primary()->constrained(
                'users'
            )->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("name")->default("");
            $table->string('avatar')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_avatar');
    }
}
