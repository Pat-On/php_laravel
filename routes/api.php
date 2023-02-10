<?php

use App\Models\Country;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// ELOQUENT Relationships

Route::get('/user/{id}/post', function ($id) {
    $user = User::find($id)->post;

    return $user;
});

// inverse relationship
Route::get('/post/{id}/user', function ($id) {
    // this one return only one specific value - 1 value back
    return Post::find($id)->user;
});

/// one to many relationship
Route::get('/posts/{id}', function ($id) {
    $user = User::find($id);
    foreach ($user->posts as $post) {
        echo $post->title;
    }
});

// many to many
Route::get('user/{id}/role', function ($id) {
    // $user = User::find($id);

    // foreach($user->roles as $role){
    //     return $role->name;
    // }

    $user = User::find($id)->roles()->orderBy('id', 'desc')->get();

    return $user;
});

// accessing intermediate table - pivot table - lookup table! o!

Route::get('user/pivot/{id}', function ($id) {
    $user = User::find($id);

    foreach ($user->roles as $role) {
        echo $role->pivot;
    }
});

// has many
Route::get('/user/country/{id}', function ($id) {
    $country = Country::find($id);
    foreach ($country->posts as $post) {
        echo $post;
    }
});


// polymorphic relations 

Route::get('user/{id}/photos', function($id){
    $user = User::find($id);

    foreach($user->photos as $photo){
        echo $photo;
    }
});


Route::get('post/{id}/photos', function($id){
    $post = Post::find($id);

    foreach($post->photos as $photo){
        echo $photo;
    }
});
