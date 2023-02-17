<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Carbon;
use App\Models\User;

// use App\Http\Controllers as C; https://www.udemy.com/course/php-with-laravel-for-beginners-become-a-master-in-laravel/learn/lecture/22307374#questions/14999442

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['middleware'=> 'web'], function(){
    Route::resource('/posts', PostController::class);

    Route::get('/dates', function(){
        // carbon

        $date = new DateTime('+1 week');

        echo $date->format('m-d-y');

        echo '<br/>';

        echo Carbon::now();
        echo '<br/>';
        echo Carbon::now()->addDays(10)->diffForHumans();
        echo '<br/>';
        echo Carbon::now()->subMonths(5)->diffForHumans();

    });



    Route::get('/getname', function(){
        $user = User::find(1);

        echo $user->name;

    });
});