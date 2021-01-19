<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarPartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_part', function (Blueprint $table) {
            $table->primary(['car_id', 'part_id']);
            $table->foreignId('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->foreignId('part_id')->references('id')->on('parts')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_part');
    }
}
