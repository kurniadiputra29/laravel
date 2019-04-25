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
// Route::get('home', function () {
//     return view('admin.home.index', ['nama' => 'Kurni']);
// });
Route::get('home', function () {
$data['nama'] ="Budi";
$data['alamat'] ="Jakal";
$data['gender'] ="1";
    return view('admin.home.index', $data);
});
Route::get('/admin', function () {
    return view('home.index');
});
Route::get('user/{id}/{nama}', function ($id, $nama) { // bisa lebih dari satu variabel
    return 'User : '.$id. '<br> Nama : '.$nama;//apapun yang kita riqueskan di browser nanti akan muncul di sini.
});
// setMyname(function(){
// 	echo "Buddi";
// });
Route::get('users/{name?}', function ($name = null) { //tidak perlu di isi
    return $name;
});

Route::get('userrs/{name?}', function ($name = 'John') { //jika tidak di isi maka john akan muncul
    return $name;
});

Route::prefix('admin')->group(function () {//prefix seperti pengulangan admin contoh get(admin/home)dan get(admin/user) intinya untuk menyingkat
    Route::get('users', function () {
        // metode mempersingkat URL contoh "/admin/users" 
    });
});
// Route::get($uri, $callback); // cara akses yaitu di riquest pada browser
// Route::post($uri, $callback);// cara akses di kirim dengan form
// Route::put($uri, $callback); 
// Route::patch($uri, $callback);
// Route::delete($uri, $callback);
// Route::options($uri, $callback);

Route::prefix('admin')->group(function (){
	Route::get('santri','Admin\SantriController@index');
	Route::get('santri/create', 'Admin\SantriController@create');
	Route::post('santri', 'Admin\SantriController@store');
	Route::get('santri/{id}/edit', 'Admin\SantriController@edit');
	Route::put('santri', 'Admin\SantriController@update');
	Route::delete('santri/{id}/delete', 'Admin\SantriController@delete');
});
Route::prefix('admin')->group(function (){
    Route::get('guru','Admin\GuruController@index');
    Route::get('guru/create','Admin\GuruController@create');
    Route::post('guru','Admin\GuruController@store');
    Route::get('guru/{id}/edit', 'Admin\GuruController@edit');
    Route::put('guru', 'Admin\GuruController@update');
    Route::delete('guru/{id}/delete', 'Admin\GuruController@delete')->name('guru.delete');
});
Route::prefix('admin')->group(function (){
    Route::get('provinsi', 'Admin\ProvinsiController@index');
    Route::get('provinsi/create', 'Admin\ProvinsiController@create');
    Route::post('provinsi', 'Admin\ProvinsiController@store');
    Route::get('provinsi/{id}/edit', 'Admin\ProvinsiController@edit');
    Route::put('provinsi', 'Admin\ProvinsiController@update');
    Route::delete('provinsi/{id}/delete', 'Admin\ProvinsiController@delete');
});