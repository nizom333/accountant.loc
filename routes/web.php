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


Route::resource('/category', 'CategoryController');

Route::resource('/home', 'CategoryController');

Route::get('/', function(){
    return view('welcome');
});
Route::get('/admin', function(){
    return view('welcome');
});

Auth::routes();
