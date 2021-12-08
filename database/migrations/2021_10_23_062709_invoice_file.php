<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InvoiceFile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_file', function (Blueprint $table) {
            $table->foreignId("id")
                ->primary()
                ->constrained("delivery")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string("file");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_file');
    }
}
