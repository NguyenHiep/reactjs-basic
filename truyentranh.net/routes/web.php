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
## Begin routes backend
Auth::routes();
Route::get('login/{social}', [
    'as'   => 'login.{social}',
    'uses' => 'Frontend\SocialAccountController@redirectToProvider'
]);

Route::get('login/{social}/callback', [
    'as'   => 'login.{social}.callback',
    'uses' => 'Frontend\SocialAccountController@handleProviderCallback'
]);

Route::middleware(['auth', 'admin'])->group(function () {
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
            Route::resource('reports', 'ReportsController')->except([
                'create', 'store', 'show'
            ]);
            Route::resource('users', 'UsersController');

            Route::prefix('getbookstool')->group(function () {
                Route::get('/', 'GetBooksToolController@index')->name('getbookstool.index');
                Route::get('create', 'GetBooksToolController@create')->name('getbookstool.create');
                Route::post('create', 'GetBooksToolController@store')->name('getbookstool.store');
                Route::get('chapters', 'GetBooksToolController@chapters')->name('getbookstool.chapters');
                Route::get('inputlink', 'GetBooksToolController@createLinkAll')->name('getbookstool.createlinkall');
                Route::post('inputlink', 'GetBooksToolController@storelinkall')->name('getbookstool.storelinkall');
                Route::get('ajax-book-tool', 'GetBooksToolController@ajaxShowInfoBook')->name('getbookstool.ajaxbooks');
            });

        });
    });
});

Route::get('/', 'FrontEndController@index')->name('front.home');
Route::get('tim-kiem','Frontend\BooksController@search')->name('front.books.search');
Route::get('danh-sach-truyen','Frontend\CategoriesController@showall')->name('front.categories.showall');
Route::get('lich-su-doc-truyen','Frontend\BooksController@show_history_read')->name('front.books.history');

Route::middleware(['auth'])->group(function () {
    Route::prefix('profile')->group(function () {
        Route::namespace('Frontend')->group(function () {
            Route::get('/','ProfileController@edit')->name('front.profile.edit');
            Route::post('/','ProfileController@update')->name('front.profile.update');
            Route::get('follow','ProfileController@follow_book')->name('front.profile.follow');
            Route::get('changepassword','ProfileController@changepassword')->name('front.profile.changepassword');
            Route::post('changepassword','ProfileController@changepassword_update')->name('front.profile.changepassword_update');
            Route::get('notification','ProfileController@notification')->name('front.profile.notification');
        });

    });

});
Route::match(['get', 'post'], 'follow.json', 'FrontEnd\AjaxController@follow_books')->name('front.ajax.followbooks');
Route::match(['get', 'post'], 'unfollow.json', 'FrontEnd\AjaxController@unfollow_books')->name('front.ajax.unfollowbooks');

Route::get('the-loai/{cat_slug}','Frontend\CategoriesController@show')->name('front.categories.show')->where('cat_slug','[a-zA-Z0-9.-]+');
Route::get('doc-truyen/{chapter_slug}', 'Frontend\BooksController@chapter_detail')->name('front.books.showdetail')->where('chapter_slug', '[a-zA-Z0-9.-]+');
Route::post('doc-truyen/{chapter_slug}', 'Frontend\ReportController@chapter')->name('front.report.chapter')->where('chapter_slug', '[a-zA-Z0-9.-]+');
Route::get('{book_slug}','Frontend\BooksController@show')->name('front.books.show')->where('book_slug','[a-zA-Z0-9.-]+');


