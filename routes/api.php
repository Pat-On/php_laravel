<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\User;
use App\Models\Address;
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


// pseudo create ^^
Route::get('/insert/{id}', function($id){
    $user = User::findOrFail($id);

    $address =new Address(['name'=>'1234 Houston Something Something']);

    // it is going to save an instance of address
    $user->address()->save($address);
});

Route::get('/update/{id}', function($id){
    // $address = Address::where('user_id', 1);
    // $address = Address::where('user_id', '=', 1);
    // here you should have add more constraints here
    $address = Address::whereUserId($id)->first();

    $address->name = 'Updated new Address';
    $address->save();
});

Route::get('/read/{id}', function($id){
    $user = User::findOrFail($id);

    echo $user->address;


});

Route::get('/delete/{id}', function($id){
    $user = User::findOrFail($id);

    $user->address()->delete();
});