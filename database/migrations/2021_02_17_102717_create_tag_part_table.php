<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagPartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_part', function (Blueprint $table) {
            $table->primary(['tag_id', 'part_id']);
            $table->foreignId('tag_id')->references('id')->on('tags')->onDelete('cascade');
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
        Schema::dropIfExists('tag_part');
    }
}
