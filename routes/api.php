<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Post;
use App\Models\Video;
use App\Models\Tag;

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

Route::get('/create', function(){
    $post = Post::create(['name'=> "Post made at ".now()]);
    $tag1 = Tag::find(1);

    $post->tags()->save($tag1);

    $video = Video::create(['name' => "Video created at ".now()]);
    $tag2 = Tag::find(2);

    $video->tags()->save($tag2);

    return "Done";
});

Route::get('/read', function(){
    $post = Post::findOrFail(4);

    foreach($post->tags as $tag){
        echo $tag;
    }
});

Route::get('/update', function(){
    // $post = Post::findOrFail(4);

    // foreach($post->tags as $tag){
    //     return $tag->whereName('Java')->update(['name' => "Updated PHP"]);
    // }

    $post = Post::findOrFail(4);

    $tag = Tag::find(2);

    // $post->tags()->save($tag);

    // $post->tags()->attach($tag);

    $post->tags()->sync([3, 4]);
});


Route::get('/delete', function(){
      $post = Post::findOrFail(4);

      // normally you would detach the tag from the post/video
    foreach($post->tags as $tag){
        $tag->whereId(3)->delete();
    }
});