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
Route::group(['prefix' => 'v1', 'namespace' => 'Apis', 'middleware' => 'auth:api'], function () {
  Route::get('getbookupdate', 'BooksController@getBooksUpdate')->name('api.books.listupdate');
  Route::get('getbooknew', 'BooksController@getBooksNew')->name('api.books.listnew');
  Route::get('getbookhot', 'BooksController@getBooksHot')->name('api.books.listhot');
});
/*Route::namespace('Apis')->group(function () {
    Route::get('getbookupdate', 'BooksController@getBooksUpdate')->name('api.books.listupdate');
    Route::get('getbooknew', 'BooksController@getBooksNew')->name('api.books.listnew');
    Route::get('getbookhot', 'BooksController@getBooksHot')->name('api.books.listhot');
});*/


/*Route::group(['middleware' => 'auth:api'], function () {

});*/

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginApiController@login');
Route::post('logout', 'Auth\LoginApiController@logout');