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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('books', 'Api\BookApiController@list');
Route::post('books', 'Api\BookApiController@store');
Route::put('books/{id}', 'Api\BookApiController@update');
Route::delete('books/{id}', 'Api\BookApiController@destroy');
Route::get('books/{id}', 'Api\BookApiController@find');
