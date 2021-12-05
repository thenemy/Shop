<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MonthPaid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('month_paid', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->float("must_pay");
            $table->float("paid");
            $table->integer("month");
            $table->foreignId("taken_credit_id")
                ->constrained("taken_credits")
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('month_paid');
    }
}
