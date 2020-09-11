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
    
    //SETTING PROFIL
    Route::get('/setting', 'ProfilController@index')->name('setting');
    
    //PASSWORD
    Route::post('/update-password', 'PasswordController@update')->name('ganti.password');

    //surat masuk
    Route::get('/surat-masuk', 'SuratMasukController@surat_masuk')->name('surat-masuk');

    //surat keluar
    Route::get('/surat-keluar', 'SuratKeluarController@surat_keluar')->name('surat-keluar');
    
});


Route::group(['middleware' => ['auth','ceklevel:admin']], function () {
    Route::get('/pegawai', 'HomeController@pegawai')->name('pegawai');


    //USERS
    Route::get('/users', 'UserController@index')->name('users');
    Route::get('/tambah-user', 'UserController@create')->name('tambah.user');
    Route::post('/simpan-user', 'UserController@store')->name('simpan.user');
    Route::get('/edit-user/{id}', 'UserController@edit')->name('edit.user');
    Route::put('/update-user/{id}', 'UserController@update')->name('update.user');
    Route::delete('/hapus-user/{id}', 'UserController@destroy')->name('hapus.user');

    //INSTANSI
    Route::get('/instansi', 'InstansiController@index')->name('instansi');
    Route::get('/tambah-instansi', 'InstansiController@create')->name('tambah.instansi');
    Route::post('/simpan-instansi', 'InstansiController@store')->name('simpan.instansi');
    Route::get('/edit-instansi/{id}', 'InstansiController@edit')->name('edit.instansi');
    Route::put('/update-instansi/{id}', 'InstansiController@update')->name('update.instansi');
    Route::delete('/hapus-instansi/{id}', 'InstansiController@destroy')->name('hapus.instansi');

    //pegawai

    //BAGIAN
    Route::get('/bagian', 'BagianController@index')->name('bagian');
    Route::get('/tambah-bagian', 'BagianController@create')->name('tambah.bagian');
    Route::post('/simpan-bagian', 'BagianController@store')->name('simpan.bagian');
    Route::get('/edit-bagian/{id}', 'BagianController@edit')->name('edit.bagian');
    Route::put('/update-bagian/{id}', 'BagianController@update')->name('update.bagian');
    Route::delete('/hapus-bagian/{id}', 'BagianController@destroy')->name('hapus.bagian');

    //JABATAN 
    Route::get('/jabatan', 'JabatanController@index')->name('jabatan');
    Route::get('/tambah-jabatan', 'JabatanController@create')->name('tambah.jabatan');
    Route::post('/simpan-jabatan', 'JabatanController@store')->name('simpan.jabatan');
    Route::get('/edit-jabatan/{id}', 'JabatanController@edit')->name('edit.jabatan');
    Route::put('/update-jabatan/{id}', 'JabatanController@update')->name('update.jabatan');
    Route::delete('/hapus-jabatan/{id}', 'JabatanController@destroy')->name('hapus.jabatan');
});

