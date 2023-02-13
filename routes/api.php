<?php

use App\Models\Photo;
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

Route::get('delete/{id}', function ($id) {
    $staff = Staff::findOrFail($id);

    // delete everything
    $staff->photos()->delete();
});

Route::get('/assign/{id}', function ($id) {
    $staff = Staff::findOrFail($id);

    $photo = Photo::findOrFail(11);

    $staff->photos()->save($photo);
});

// idea:
// - custom method to attach the photos

Route::get('/unassign/{id}', function ($id) {
    $staff = Staff::findOrFail($id);

    // $photo = Photo::findOrFail(11);

    // $staff->photos()->whereId(11)->update(['imageable_id' => null, 'imageable_type' => '']);
    // $staff->photos()->whereId(11)->update(['imageable_id'=>null,'imageable_type'=>null]);

    // funny db constrain - and how mysql engine is working
    // in shortcut ' ' and null may be considered empty
    // and engine is ignoring it and keeping old value
    return $staff->photos()->whereId(11)->update(['imageable_id' => '0', 'imageable_type' => '0']);
});
