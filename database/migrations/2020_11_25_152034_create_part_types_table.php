<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_ar');
            $table->timestamps();
        });
        
        DB::table('part_types')->insert([
            ['id' => '1', 'name' => 'oem', 'name_ar' => 'جديد'],
            ['id' => '2', 'name' => 'aftermarket', 'name_ar' => 'تجاري'],
            ['id' => '3', 'name' => 'used', 'name_ar' => 'مستعمل'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('part_types');
    }
}
