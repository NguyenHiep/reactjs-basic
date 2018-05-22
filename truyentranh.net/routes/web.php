<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

## Begin routes backend
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::prefix('manage')->group(function () {
        Route::get('/', 'ManageController@index')->name('manage');
        Route::namespace('Manage')->group(function () {
            Route::get('sliders/{slider}/delete', 'SlidersController@delete')->where('slider', '[0-9]+')->name('sliders.delete');
            Route::post('sliders/batch', 'SlidersController@batch')->name('sliders.batch');
            Route::resource('sliders', 'SlidersController');
        });
    });
});


