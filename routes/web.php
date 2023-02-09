<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
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
// Route::get('/find', function(){
//     $posts = Post::all();

//     return $posts;

// });

Route::get('findwhere', function () {
    $posts = Post::where('id', 2)->orderBy('id', 'desc')->take(1)->get();

    return $posts;
});

// Sometimes you may wish to throw an exception if a model is not found. This is particularly useful in routes or controllers. The findOrFail and firstOrFail methods will retrieve the first result of the query; however, if no result is found, an Illuminate\Database\Eloquent\ModelNotFoundException will be thrown:
Route::get('/findmore', function () {
    //
    $posts = Post::findOrFail(3);

    // $posts = Post::where('id', '<', 50)->firstOrFail();

    return $posts;
});

//

// Route::get('/basicinsert', function(){
//     $post = new Post;

//     $post->title = "New Eloquent title inwerted";
//     $post->content = "wow it is cool";

//     $post->save();
// });

Route::get('/basicinsert', function () {
    $post = Post::find(1); // base on id

    $post->title = 'New Eloquent title inwerted';
    $post->content = 'wow it is cool';

    $post->save();
});

// this feature work very well with forms

// mass assignment operation - Laravel/eloquent is blocking it
Route::get('/create', function () {
    Post::create(['title' => 'the create method', 'content' => 'wow I am learning! I love learning!', 'is_admin' => 0]);
});

Route::get('/update', function () {
    Post::where('id', 2)->where('is_admin', 0)->update(['title' => 'Updated title']);
});

Route::get('/delete', function () {
    $post = Post::find(1);

    $post->delete();
});

Route::get('/delete2', function () {
    Post::destroy(2);
});

Route::get('/delete3', function () {
    Post::destroy([4, 5]);

    // Post::where('is_admin', 0)->delete();
});

// soft delete

Route::get('/softdelete', function () {
    Post::find(2)->delete();
    // it is going to add the stamp to deleted_at and will not pul it
});

Route::get('/readsoftdelete', function () {
    // $post = Post::find(1);
    // return $post;

    // $post = Post::withTrashed()->where('id', 1)->get();
    // return $post;

    $post = Post::onlyTrashed()->get();

    return $post;
});

Route::get('/restore', function () {
    Post::withTrashed()->where('is_admin', 0)->restore();
});

// deleting items permanently

Route::get('/forcedelete', function () {
    Post::onlyTrashed()->forceDelete();
});
