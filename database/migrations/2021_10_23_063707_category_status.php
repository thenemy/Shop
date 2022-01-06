<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CategoryStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_statuses', function (Blueprint $table) {
            $table->foreignId('id')->nullable()->constrained('categories')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->boolean("status"); // archive or not
            // false not archived
            // true is archived
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
