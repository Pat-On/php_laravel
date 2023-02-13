<?php

use App\Models\Staff;
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

Route::get('/create/{id}', function ($id) {
    $staff = Staff::find($id);

    $staff->photos()->create(['path' => 'example.jpg']);
});

Route::get('/read/{id}', function ($id) {
    // find object
    $staff = Staff::findOrFail($id);

    // find relationship
    foreach ($staff->photos as $photo) {
        // place for where() method
        echo $photo;
    }
});

Route::get('/update/{id}', function ($id) {
    // find object
    $staff = Staff::findOrFail($id);

    // object
    $photo = $staff->photos()->whereId(1)->first();

    // put properties
    $photo->path = 'Updated example.jpg';

    // save
    $photo->save();
});


Route::get('delete/{id}', function($id){
    $staff = Staff::findOrFail($id);

    // delete everything
    $staff->photos()->delete();
});