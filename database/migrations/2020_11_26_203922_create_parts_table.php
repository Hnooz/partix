<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('number');
            $table->string('slug');
            $table->integer('price');
            $table->integer('second_price')->nullable();
            $table->integer('sale')->nullable();
            $table->foreignId('supplier_id')->nullable();
            $table->foreignId('category_id')->nullable();
            $table->foreignId('part_type_id')->nullable();
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
        Schema::dropIfExists('parts');
    }
}
