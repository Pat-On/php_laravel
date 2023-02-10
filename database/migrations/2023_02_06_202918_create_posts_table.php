<?php

// php artisan make:migration create_posts_table --create="posts"

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // dependency injection
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            // one to one relation
            // $table->integer('user_id')->unsigned(); // commented out in the video 69 - no needed in polymorphic relationship - lessons dependable on it would stop working
            // $table->unsignedInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users');
            $table->string('title');
            $table->text('content');
            $table->smallInteger('is_admin')->default(0);
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
        Schema::dropIfExists('posts');
    }
};
