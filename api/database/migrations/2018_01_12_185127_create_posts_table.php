<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('author_id');
            $table->unsignedSmallInteger('type');
            $table->json('data');
            $table->unsignedSmallInteger('status');
            $table->timestamps();
            $table->softDeletes();

            $table->index('author_id');
        });

        Schema::create('pet_post', function (Blueprint $table) {
            $table->unsignedBigInteger('pet_id');
            $table->unsignedBigInteger('post_id');
            $table->primary(['pet_id', 'post_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
        Schema::dropIfExists('pet_post');
    }
}
