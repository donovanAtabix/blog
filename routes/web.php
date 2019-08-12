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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/blogposts/index', 'PostController@index');

Route::get('/blogposts/createpost', 'PostController@creatpost');

Route::post('/blogposts/create', 'PostController@store');

Route::get('/blogposts/{post}/show', 'PostController@show');

Route::post('/blogposts/{post}/comment', 'CommentController@store');

Route::get('/blogposts/{post}/edit', 'PostController@edit');

Route::patch('/blogposts/{post}/edit', 'PostController@update');

Route::delete('/blogposts/{post}/edit', 'PostController@destroy');

Route::post('/blogposts/{post}/show', 'CommentController@store');

Route::get('/blogposts/{comment}/edit-comment', 'CommentController@edit');
