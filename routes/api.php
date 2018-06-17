<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('api')->post('/register', 'Auth\RegisterController@store');
Route::middleware('api')->post('/login', 'Auth\LoginController@authenticate')->name('login');
Route::middleware('api')->get('/galleries', 'GalleriesController@index')->name('galleries');
Route::middleware('api')->get('/galleries/{id}', 'GalleriesController@show');
Route::middleware('api')->post('/galleries', 'GalleriesController@store');
