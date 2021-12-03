<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Shops extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->foreignId('id')->primary()->constrained('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string("name");
            $table->string("document")->default("");
            $table->string("licence")->default("");
            $table->string("director_passport")->default("");
            $table->string("image")->default("");
            $table->string("logo")->default("");
            $table->string("slug")->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
