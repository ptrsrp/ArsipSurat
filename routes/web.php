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
    return 'Anda Tidak Punya Akses';
});

// login
Route::get('/login', 'LoginController@index')->name('login');
Route::post('/postlogin', 'LoginController@postlogin')->name('postlogin');

// validasi agar harus login dulu, tidak bisa masuk home sebelum login
Route::group(['middleware' => ['auth','ceklevel:admin,petugas']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/surat', 'HomeController@surat')->name('surat');
    Route::get('/instansi', 'HomeController@instansi')->name('instansi');
    Route::get('/pegawai', 'HomeController@pegawai')->name('pegawai');
});


Route::group(['middleware' => ['auth','ceklevel:admin']], function () {
    Route::get('/petugas', 'HomeController@petugas')->name('petugas');
});


// logout
Route::get('/logout', 'LoginController@logout')->name('logout');
