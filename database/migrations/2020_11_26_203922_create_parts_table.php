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
            $table->string('name_ar');
            $table->text('description');
            $table->text('description_ar');
            $table->string('number');
            $table->string('slug')->nullable();
            $table->integer('oem_price')->default(0)->nullable();
            $table->integer('aftermarket_price')->default(0)->nullable();
            $table->integer('used_price')->default(0)->nullable();
            $table->integer('sale')->default(0)->nullable();
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
