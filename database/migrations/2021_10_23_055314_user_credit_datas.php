<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserCreditDatas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('user_credit_datas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->unique()
                ->index()
                ->constrained('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId("crucial_data_id")
                ->unique()
                ->index()
                ->constrained("crucial_data")
                ->restrictOnUpdate()
                ->restrictOnDelete();
            $table->string("additional_phone");
            $table->integer("sex")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_credit_data');
    }
}
