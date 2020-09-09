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

// login
Route::get('/login', 'LoginController@index')->name('login');
Route::post('/postlogin', 'LoginController@postlogin')->name('postlogin');
// logout
Route::get('/logout', 'LoginController@logout')->name('logout');

// validasi agar harus login dulu, tidak bisa masuk home sebelum login
Route::group(['middleware' => ['auth','ceklevel:admin,petugas']], function () {
    Route::get('/ArsipSurat', 'HomeController@index')->name('dashboard');
    Route::get('/surat', 'HomeController@surat')->name('surat');
    

    //surat masuk
    Route::get('/surat-masuk', 'SuratMasukController@surat_masuk')->name('surat-masuk');

    //surat keluar

    
    //setting
});


Route::group(['middleware' => ['auth','ceklevel:admin']], function () {
    Route::get('/pegawai', 'HomeController@pegawai')->name('pegawai');
    Route::get('/setting', 'HomeController@setting')->name('setting');

    //USERS
    Route::get('/users', 'UserController@index')->name('users');
    Route::post('/simpan-user', 'UserController@store')->name('simpan.user');
    Route::put('/update-user/{id}', 'UserController@update')->name('update.user');
    Route::get('/hapus-user/{id}', 'UserController@destroy')->name('hapus.user');

    //INSTANSI
    Route::get('/instansi', 'InstansiController@index')->name('instansi');
    Route::post('/simpan-instansi', 'InstansiController@store')->name('simpan.instansi');
    Route::put('/update-instansi/{id}', 'InstansiController@update')->name('update.instansi');
    Route::get('/hapus-instansi/{id}', 'InstansiController@destroy')->name('hapus.instansi');

    //pegawai

    //BAGIAN
    Route::get('/bagian', 'BagianController@index')->name('bagian');
    Route::post('/simpan-bagian', 'BagianController@store')->name('simpan.bagian');
    Route::put('/update-bagian/{id}', 'BagianController@update')->name('update.bagian');
    Route::get('/hapus-bagian/{id}', 'BagianController@destroy')->name('hapus.bagian');

    //JABATAN 
    Route::get('/jabatan', 'JabatanController@index')->name('jabatan');
    Route::post('/simpan-jabatan', 'JabatanController@store')->name('simpan.jabatan');
    Route::put('/update-jabatan/{id}', 'JabatanController@update')->name('update.jabatan');
    Route::get('/hapus-jabatan/{id}', 'JabatanController@destroy')->name('hapus.jabatan');
});

