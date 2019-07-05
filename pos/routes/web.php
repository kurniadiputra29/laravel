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
Route::get('/login', 'LoginController@form')->name('login.form');
Route::post('/login', 'LoginController@login')->name('log.login');
Route::post('/logout', 'LoginController@logout')->name('login.logout');


Route::prefix('admin')->group(function (){
	Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
});

Route::prefix('admin')->group(function (){
	Route::get('category', 'CategoryController@index')->name('category.index');
	Route::get('category/create', 'CategoryController@create')->name('category.create');
	Route::post('category', 'CategoryController@store')->name('category.store');
	Route::get('category/{id}/edit', 'CategoryController@edit')->name('category.edit');
	Route::put('category/{id}', 'CategoryController@update')->name('category.update');
	Route::delete('category/{id}', 'CategoryController@destroy')->name('category.destroy');
	Route::get('category/json_category', 'CategoryController@json_category');
});


Route::prefix('admin')->group(function (){
	Route::get('item', 'ItemController@index')->name('item.index');
	Route::get('item/create', 'ItemController@create')->name('item.create');
	Route::post('item', 'ItemController@store')->name('item.store');
	Route::get('item/{id}/edit', 'ItemController@edit')->name('item.edit');
	Route::put('item/{id}', 'ItemController@update')->name('item.update');
	Route::delete('item/{id}', 'ItemController@destroy')->name('item.destroy');
	Route::get('trash', 'ItemController@trash')->name('item.trash');
	Route::delete('trash/{id}', 'ItemController@forceDelete')->name('item.forceDelete');
	Route::get('item/json_item', 'ItemController@json_item');
});

Route::prefix('admin')->group(function (){
	Route::get('order', 'OrderController@index')->name('order.index');
	Route::get('order/create', 'OrderController@create')->name('order.create');
	Route::post('order', 'OrderController@store')->name('order.store');
	Route::get('order/{id}/edit', 'OrderController@edit')->name('order.edit');
	Route::put('order/{id}', 'OrderController@update')->name('order.update');
	Route::delete('order/{id}', 'OrderController@destroy')->name('order.destroy');
	//untuk print
	Route::get('order/{id}/print', 'OrderController@print')->name('order.print');
	//untuk sendmail
	Route::post('/sendEmail/{id}', 'MailController@send')->name('order.sendEmail');
	//untuk yajra
	Route::get('order/json_order', 'OrderController@json_order');
});

Route::prefix('admin')->group(function (){
	Route::get('payment', 'PaymentController@index')->name('payment.index');
	Route::get('payment/create', 'PaymentController@create')->name('payment.create');
	Route::post('payment', 'PaymentController@store')->name('payment.store');
	Route::get('payment/{id}/edit', 'PaymentController@edit')->name('payment.edit');
	Route::put('payment/{id}', 'PaymentController@update')->name('payment.update');
	Route::delete('payment/{id}', 'PaymentController@destroy')->name('payment.destroy');
	Route::get('payment/json_payment', 'PaymentController@json_payment');

});

Route::prefix('admin')->group(function (){
	Route::get('user', 'UserController@index')->name('user.index');
	Route::get('user/create', 'UserController@create')->name('user.create');
	Route::post('user', 'UserController@store')->name('user.store');
	Route::get('user/{id}/edit', 'UserController@edit')->name('user.edit');
	Route::put('user/{id}', 'UserController@update')->name('user.update');
	Route::delete('user/{id}', 'UserController@destroy')->name('user.destroy');
	Route::get('user/json_user', 'UserController@json_user');
});

Route::prefix('admin')->group(function (){
	Route::get('laporan', 'LaporanController@index')->name('laporan.index');
	Route::post('laporan/filter', 'LaporanController@filter')->name('laporan.filter');
	Route::post('laporan/download', 'LaporanController@download')->name('laporan.download');
});

Route::group(['prefix' => 'social-media', 'namespace' => 'Auth'], function(){
    Route::get('register/{provider}', 'SocialiteController@register');
    Route::get('registered/{provider}', 'SocialiteController@registered');
});

Route::prefix('admin')->group(function (){
	Route::get('resetpassword', function () {
		return view('ubah.email');
	})->name('resetpassword');
	Route::post('resetpassword', 'LoginController@resetpass')->name('reset.pass');
	Route::get('confirmasipassword', function () {
		return view('ubah.confirmasi');
	})->name('confirm');
	Route::post('confirmasipassword', 'LoginController@confirmpass')->name('confirm.pass');
	Route::put('reset', 'LoginController@update')->name('reset.update');
	Route::get('register', function () {
		return view('ubah.register');
	})->name('register');
	Route::post('register', 'LoginController@register')->name('proses.register');
});

Route::prefix('admin')->group(function (){
	Route::get('coba', function () {
		return view('order.modal');
	})->name('coba');
});