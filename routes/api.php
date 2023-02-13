<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\User;
use App\Models\Role;

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


Route::get('create/{id}', function($id){
    $user = User::find($id);

    $role = new Role(['name' => rand(0,10) >= 5 ? "Administrator" : "Subscriber"]);

    $user->roles()->save($role);
});

Route::get('/read/{id}', function($id){
    $user = User::findOrFail($id);

// print_r($user);

    // dd($user->roles);

    foreach($user->roles as $role){
        // dd($role);
        echo $role->name . '<br/>';
    }
});

Route::get('/update/{id}', function($id){
    $user = User::findOrFail($id);

    // finding relationship
    if($user->has('roles')){
        foreach($user->roles as $role){
            if($role->name == 'Administrator'){
                $role->name = 'Subscriber';

            } else if($role->name == 'Subscriber'){
                $role->name = 'Administrator';
            }

            $role->save();
        }
    }
});

Route::get('/delete/{id}', function($id){
    $user = User::findOrFail($id);

    // $user->roles()->delete();

    foreach($user->roles as $role){
        // dd($role);

        $role->where('name', '=', 'Administrator')->delete();
    }
});

// this one is creating more record in DB, so you need to check if you already created attachment
Route::get('/attach/{id}', function($id){
    $user = User::findOrFail($id);

    $user->roles()->attach(3);

});

// if you have multiple references it is detaching every single of them
// without id it would detached everything
Route::get('/detach/{id}', function($id){
    $user = User::findOrFail($id);

    $user->roles()->detach(3);

});


Route::get("/sync/{id}", function($id) {
    $user = User::findOrFail($id);

    // it would get array of ids and if does not exist it would delete the rest
    // it is like attach and detach in one :>
    $user->roles()->sync([3, 4, 5]);

});