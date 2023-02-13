<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



// php artisan make:migration create_role_user_table --create=role_user 
// we follow this convention to create pivot table - lookup table

// - alphabetical order
// role_user 
// singular


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->nullable()->index(); // it will look for it as a default var
            $table->integer('role_id')->unsigned()->nullable()->index(); // the same
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
        Schema::dropIfExists('role_user');
    }
};
