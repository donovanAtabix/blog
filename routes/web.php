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

//een home page
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('blog', 'PostController@index');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('profile', 'ProfileController')->only(['store', 'destroy', 'index']);

    Route::resource('users', 'UserController')->only(['update']);

    Route::get('/home', 'HomeController@index')->name('home');


    Route::group(['prefix' => 'blog'], function () {
        Route::resource('posts', 'PostController')->except(['index']);

        Route::resource('comments', 'CommentController');

        //posts/{post}/comments

        Route::post('{post}/show', 'CommentController@store');

        Route::get('/createpost', 'PostController@create');
    });
});
