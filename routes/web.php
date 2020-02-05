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


Route::get('/', 'PostController@index')->name('home');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', 'UserController')->only(['store', 'destroy', 'index', 'update']);

    Route::group(['prefix' => 'blog'], function () {
        Route::resource('posts', 'PostController')->except(['index']);

        Route::resource('posts/{post}/comments', 'CommentController');

        Route::resource('documents', 'DocumentController');

    });
});
