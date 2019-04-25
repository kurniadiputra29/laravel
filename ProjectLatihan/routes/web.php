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
Route::get('/admin', function () {
	return view('layout.app2');
});
Route::get('/layout', function () {// ada dua tipe yaitu yang pertama adalah alamat web & dan yang ke dua adalah arah tujuanya.
    return view('layout.app');
});
Route::get('/article', function () {
	return view('article.index');
});
Route::get('/category', function () {
	return view('category.index');
});
Route::get('/article', function () {
	return view('article.index2');
})->name('artikel');
Route::get('/category', function () {
	return view('category.index2');
});

Route::get('/pegawai/{nama}', 'PegawaiController@index');
Route::get('/pangkat/{angka}', 'PegawaiController@pangkat');

Route::get('/formulir', 'PegawaiController@formulir');
Route::post('/proses', 'PegawaiController@proses');
