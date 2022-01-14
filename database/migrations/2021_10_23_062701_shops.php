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
     *
     * interval of working time can be found at
     * shop_address
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->foreignId('id')->primary()->constrained('users')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->string("name");
            $table->string("document")->default("");
            $table->string("licence")->default("");
            $table->string("director_passport")->default("");
            $table->string("image")->default("");
            $table->string("logo")->default("");
            $table->boolean("self_delivery")->default(false);// can be done or not
            $table->string("slug")->unique();
            // for delivery time and
            // also to shop for self delivery
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
