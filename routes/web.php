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

//Route::resource('/home', 'CategoryController');
Auth::routes();
Route::resource('/category', 'CategoryController');
Route::resource('/category/items', 'ItemsController');

Route::get('/', 'CategoryController@index');

Route::resource('/settings', 'HomeController');



