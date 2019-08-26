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

Auth::routes();

Route::resource('profile', 'ProfileController')->middleware('auth');

Route::get('profile', 'ProfileController@profile')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/blogposts', 'PostController@index');

Route::get('/blogposts/createpost', 'PostController@createpost')->middleware('auth');

Route::post('blogposts/{post}/show', 'CommentController@store')->middleware('auth');

Route::group(['prefix' => 'blogposts'], function () {
    Route::get('/blogposts', 'PostController@index')->middleware('guest');

    Route::resource('posts', 'PostController')->except(['index'])->middleware('auth');

    Route::resource('comments', 'CommentController')->middleware('auth');
});

View::composer('*', function ($view) {

    if (auth()->user()) {
        $view->with(['thumb' => auth()->user()->getFirstMediaUrl('avatar', 'thumb')]);
    }
});
