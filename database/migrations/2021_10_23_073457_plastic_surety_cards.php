<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PlasticSuretyCards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plastic_surety_cards', function (Blueprint $table) {
            $table->foreignUuid("plastic_id")
                ->constrained("plastic_card")
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
                $table->foreignId('surety_id')
                ->constrained('surety_data')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->primary(['plastic_id', 'surety_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plastic_surety_cards');
    }
}
