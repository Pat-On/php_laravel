<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\User;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/create/{id}', function($id){
    $user = User::findOrFail($id);

    $post = new Post(['title'=> "title", "body" => "This is a body"]);

    $user->posts()->save($post);
    // $user->posts()->save(new Post(['title'=> "title", "body" => "This is a body"]));
});


Route::get('/read/{id}', function ($id) {
    $user = User::findOrFail($id);

    // return array of it
    // return $user->posts;

    // collection
    // dd($user->posts);

        // object
    // dd($user);

    foreach($user->posts as $post){
        echo $post;
    };

});

Route::get('user/{user_id}/update/{post_id}', function($user_id, $post_id){
    $user = User::find($user_id);

    // whereId('id', '=', 2)
    $user->posts()->whereId($post_id)->update(["title" => "Updated at: ". now()]);
});

Route::get('/delete/{id}/{post_id}', function($id, $post_id){
    $user = User::find($id);

    $user->posts()->whereId($post_id)->delete();

    // remove everything
    $user->posts()->delete();
});