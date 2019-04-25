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
Route::get('articles/trash', 'ArticleController@trash')->name('articles.trash');
Route::delete('articles/{id}/forceDelete', 'ArticleController@forceDelete')->name('articles.forceDelete');
Route::resource('articles', 'ArticleController');