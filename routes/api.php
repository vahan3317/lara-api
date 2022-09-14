<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Models\Users;
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

Route::get('users', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return Users::all();
});
 
Route::get('users/{id}', function($id) {
    return Users::find($id);
});

Route::post('users', function(Request $request) {
    return Users::create($request->all);
});

Route::put('users/{id}', function(Request $request, $id) {
    $article = Users::findOrFail($id);
    $article->update($request->all());

    return $article;
});

Route::delete('users/{id}', function($id) {
    Users::find($id)->delete();

    return 204;
});

// Route::get('users', 'App\Http\Controllers\Api\UsersController@index');
// Route::get('users/{id}', 'UsersController@show');
// Route::post('users', 'UsersController@store');
// Route::put('users/{id}', 'UsersController@update');
// Route::delete('users/{id}', 'UsersController@delete');
// Route::get('/users', [UsersController::class, 'index']);