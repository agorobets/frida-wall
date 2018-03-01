<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->unique();
            $table->unsignedSmallInteger('status');
            $table->timestamps();
        });

        Schema::create('pet_color', function (Blueprint $table) {
            $table->unsignedBigInteger('pet_id');
            $table->unsignedBigInteger('color_id');
            $table->primary(['pet_id', 'color_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colors');
        Schema::dropIfExists('pet_color');
    }
}
