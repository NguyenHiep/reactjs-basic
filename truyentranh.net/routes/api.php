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


Route::group(['middleware' => 'auth:api'], function() {
    Route::get('articles', 'Apis\ArticleController@index');
    Route::get('articles/{article}', 'Apis\ArticleController@show');
    Route::post('articles', 'Apis\ArticleController@store');
    Route::put('articles/{article}', 'Apis\ArticleController@update');
    Route::delete('articles/{article}', 'Apis\ArticleController@delete');

    Route::get('sliders', 'Apis\SlidersController@index');
    Route::get('sliders/{slider}', 'Apis\SlidersController@show');
    Route::post('sliders', 'Apis\SlidersController@store');
    Route::put('sliders/{slider}', 'Apis\SlidersController@update');
    Route::delete('sliders/{slider}', 'Apis\SlidersController@delete');
});

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginApiController@login');
Route::post('logout', 'Auth\LoginApiController@logout');