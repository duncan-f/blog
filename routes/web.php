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

Auth::routes(['verify' => true]);

Route::resource('posts', 'PostController');

Route::middleware('verified')->group(function() {
	Route::get('/', 'HomeController@index')->name('home')->withoutMiddleware(['verified']);
	Route::resource('categories', 'CategoryController');
	Route::resource('comments', 'CommentController', ['only' => ['store', 'replyStore', 'edit', 'destroy']]);
	Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');
});
