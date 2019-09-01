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

Route::get('/', 'PostsController@index');

Route::resource('Comments', 'CommentsController');

Route::resource('Posts', 'PostsController');

Route::get('/users', 'ViewsController@users');

Route::get('/user/{username}', 'ViewsController@user');

Route::get('/recent', 'ViewsController@recent');

Route::get('/about', 'ViewsController@about');

