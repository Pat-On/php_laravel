<?php

use App\Http\Controllers\PostController;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function(){
    return view('welcome');
});


Route::group(['middleware' => 'web'], function () {
    Route::resource('/posts', PostController::class);

    Route::get('/dates', function () {
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

    Route::get('/getname', function () {
        $user = User::find(1);

        echo $user->name;
    });

    Route::Get('/setname', function () {
        $user = User::find(1);

        $user->name = 'william';

        $user->save();
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
