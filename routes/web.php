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
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::get('/surat', 'HomeController@surat')->name('surat');
    
    Route::get('/pegawai', 'HomeController@pegawai')->name('pegawai');
    Route::get('/setting', 'HomeController@setting')->name('setting');

    //surat masuk
    Route::get('/surat-masuk', 'SuratMasukController@surat_masuk')->name('surat_masuk');

    //surat keluar

    //instansi
    Route::get('/instansi', 'InstansiController@index')->name('instansi');
    Route::get('/tambah-instansi', 'InstansiController@create')->name('tambah_instansi');

    //pegawai

    //bagian

    //setting
});


Route::group(['middleware' => ['auth','ceklevel:admin']], function () {
    Route::get('/users', 'HomeController@users')->name('users');
});


// logout
Route::get('/logout', 'LoginController@logout')->name('logout');
