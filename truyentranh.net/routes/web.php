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

/*Route::get('/', function () {
    return view('home');
});*/



## Begin routes backend
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::prefix('manage')->group(function () {
        Route::get('/', 'ManageController@index')->name('manage');
        Route::namespace('Manage')->group(function () {
            Route::get('sliders/{slider}/delete', 'SlidersController@delete')->where('slider', '[0-9]+')->name('sliders.delete');
            Route::post('sliders/batch', 'SlidersController@batch')->name('sliders.batch');
            Route::resource('sliders', 'SlidersController');

            Route::get('categories/{category}/delete', 'CategoriesController@delete')->where('category', '[0-9]+')->name('categories.delete');
            Route::post('categories/batch', 'CategoriesController@batch')->name('categories.batch');
            Route::resource('categories', 'CategoriesController');

            Route::get('books/{book}/delete', 'BooksController@delete')->where('book', '[0-9]+')->name('books.delete');
            Route::post('books/batch', 'BooksController@batch')->name('books.batch');
            Route::resource('books', 'BooksController');

            Route::get('chapters/{chapter}/delete', 'ChaptersController@delete')->where('chapter', '[0-9]+')->name('chapters.delete');
            Route::post('chapters/batch', 'ChaptersController@batch')->name('chapters.batch');
            Route::resource('chapters', 'ChaptersController');
        });
    });
});

Route::get('/', 'FrontEndController@index')->name('front.home');

Route::get('danh-sach-truyen','Frontend\CategoriesController@showall')->name('front.categories.showall');

Route::get('the-loai/{cat_slug}','Frontend\CategoriesController@show')->name('front.categories.show')->where('cat_slug','[a-zA-Z.-]+');

Route::get('{book_slug}/{chapter}','Frontend\BooksController@chapter_detail')->name('front.books.showdetail')->where([
    'book_slug'    => '[a-zA-Z0-9.-]+',
    'chapter_slug' => '[a-zA-Z0-9.-]+',
]);
Route::post('{book_slug}/{chapter}', 'Frontend\ReportController@chapter')->name('front.report.chapter')->where([
    'book_slug'    => '[a-zA-Z0-9.-]+',
    'chapter_slug' => '[a-zA-Z0-9.-]+',
]);;

Route::get('{book_slug}','Frontend\BooksController@show')->name('front.books.show')->where('book_slug','[a-zA-Z0-9.-]+');

