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

Route::get('/', 'HomeController@list');

Auth::routes();

Route::get('/admin', 'BooksController@list');

// Route::get('/admin/user/list', 'UsersController@listAll');
// Route::get('/admin/user/{id}', 'UsersController@show');

Route::delete('/book/{id}', 'BooksController@delete');
Route::post('/book', 'BooksController@add');
