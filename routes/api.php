<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Post;
use App\Models\User;
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

Route::get('/user/{id}/post', function($id) {

   $user =  User::find($id)->post;

   return $user;
});
