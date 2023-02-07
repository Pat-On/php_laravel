<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/about', function () {
//     return "About Page";
// });

// Route::get('/contact', function () {
//     return "Contact Page";
// });

// Route::get('/post/{id}', function($id){
//     return "$id";
// });

// Route::get('/post/{id}/name', function($id, $name){
//     return "$id $name";
// });

// Route::get('/post/{id}', '\App\Http\Controllers\PostController@index');
// or
Route::get('/post2', [PostController::class, 'index']);

// use App\Http\Controllers\HomeController; //
// Route::get('/', [EdwinsController::class, 'index']);

// naming routes
Route::get('admin/posts/example', ['as' => 'admin.home', function () {
    $url = route('admin.home');

    return $url;
}]);

// Route::resource('posts', '\App\Http\Controllers\PostController'); // crud

Route::get('/contact', [PostController::class, 'contact']);

Route::get('post/{id}', [PostController::class, 'show_post']);

// demo
// Route::get('/insert', function () {
//     DB::insert('INSERT INTO posts(title, content) value(?, ?)', ['PHP with Laravel', 'Laravel is the best']);
// });
// Route::get('/read', function () {
//     $results = DB::select('SELECT * from posts');
//     // std class object - generic empty class

//     return var_dump($results);

//     foreach ($results as $post) {
//         return $post->title;
//     }
// });


/*
        ELOQUENT 
*/
Route::get('/find', function(){
    $posts = Post::all();

    return $posts;

});