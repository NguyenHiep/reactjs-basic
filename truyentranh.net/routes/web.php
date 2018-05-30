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
    return view('home');
});

Route::get('/', 'FrontEndController@index')->name('front.home');

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

            Route::post('/upload_image', function() {
                $CKEditor = \Input::get('CKEditor');
                $funcNum = \Input::get('CKEditorFuncNum');
                $message = $url = '';
                if (\Input::hasFile('upload')) {
                    $file = \Input::file('upload');
                    if ($file->isValid()) {
                        $filename = $file->getClientOriginalName();
                        $file->move(storage_path().'/images/', $filename);
                        $url = public_path() .'/images/' . $filename;
                    } else {
                        $message = 'An error occured while uploading the file.';
                    }
                } else {
                    $message = 'No file uploaded.';
                }
                return '<script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.', "'.$url.'", "'.$message.'")</script>';
            });

        });
    });
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

