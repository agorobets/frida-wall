<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('owner_id');
            $table->unsignedInteger('kind_id');
            $table->unsignedInteger('breed_id');
            $table->string('nickname', 60)->unique();
            $table->string('display_name', 255);
            $table->text('description')->nullable();
            $table->dateTime('born_at')->nullable();
            $table->dateTime('died_at')->nullable();
            $table->unsignedSmallInteger('age')->nullable();
            $table->string('gender', 1)->nullable();
            $table->unsignedInteger('color')->nullable();
            $table->unsignedSmallInteger('status');

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
        Schema::dropIfExists('pets');
    }
}
