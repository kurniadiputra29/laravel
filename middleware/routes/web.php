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
//coba
Route::get('/film', function (){
	return "Anda sudah  dewasa";
})->middleware('cek-umur');//untuk membuat middleware
Route::get('/cek', function (){
	return view('cek');
});

//login
Route::get('/users', 'UserController@index')->name('users.index');
Route::get('/cek-status', 'UserController@cek')->name('users.cek');

Route::get('/form', 'AuthController@form')->name('auth.form');
Route::post('/login', 'AuthController@login')->name('auth.login');
Route::post('/logout', 'AuthController@logout')->name('auth.logout');