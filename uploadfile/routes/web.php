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
Route::get('/index', 'UploadController@index')->name('index');
Route::get('/upload', 'UploadController@upload')->name('create');
Route::post('/upload/proses', 'UploadController@proses_upload');
Route::get('/upload/hapus/{id}', 'UploadController@hapus');
Route::get('/edit/{id}', 'UploadController@edit')->name('edit');
Route::put('/update/{id}', 'UploadController@update')->name('update');