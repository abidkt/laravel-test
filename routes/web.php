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

Route::prefix('users')->group(function () {
    Route::get('/', 'UsersController@index')->name('users');
    Route::get('/export', 'UsersController@export')->name('user-export-1');
    Route::get('/export-two', 'UsersController@exportTwo')->name('user-export-2');
});
