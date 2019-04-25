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
// yang biasa di pakai 
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {// home adalah mewakili alamat nya, pada browser atau riquest pada browser.
	return view('home'); // ini menunjukkan field tujuan, tanpa harus ketik .php. Bisa menggunakan echo atau return
});
Route::get('/rumah', function () {// home adalah mewakili alamat nya.
	return view('depan.rumah'); // ini menunjukkan field tujuan, tanpa harus ketik .php dan untuk menghubungkan menggunakan . titik atau menggunakan /
});
Route::get('/da', function (){
	return view('depan.da.da');// coba 3 folder
});
Route::get('/controller', 'BlogController@ucapan' // untuk memanggil controller dan @ digunakan untuk method yang kita buat.
);