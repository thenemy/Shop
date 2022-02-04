<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IconCats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icon_cats', function (Blueprint $table) {
            $table->foreignId('id')->primary()->constrained('categories')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('icon');
            $table->string("image");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('icon_cats');
    }
}
