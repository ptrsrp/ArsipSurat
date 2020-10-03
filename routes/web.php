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
    Route::get('/edit-profil', 'ProfilController@editProfil')->name('profil.edit');
    Route::put('/update-profil', 'ProfilController@updateProfil')->name('profil.update');
    Route::get('/ganti-password', 'ProfilController@gantiPassword')->name('profil.password');
    
    //PASSWORD
    Route::post('/update-password', 'PasswordController@update')->name('ganti.password');

    //INSTANSI
    Route::get('/instansi/json', 'InstansiController@json');
    Route::get('/instansi', 'InstansiController@index')->name('instansi');
    Route::get('/tambah-instansi', 'InstansiController@create')->name('tambah.instansi');
    Route::post('/simpan-instansi', 'InstansiController@store')->name('simpan.instansi');
    Route::get('/edit-instansi/{id}', 'InstansiController@edit')->name('edit.instansi');
    Route::put('/update-instansi/{id}', 'InstansiController@update')->name('update.instansi');
    Route::delete('/hapus-instansi/{id}', 'InstansiController@destroy')->name('hapus.instansi');

    //surat masuk
    Route::get('/surat-masuk/json', 'SuratMasukController@json');
    Route::get('/surat-masuk', 'SuratMasukController@index')->name('surat-masuk');
    Route::get('/tambah-surat-masuk', 'SuratMasukController@create')->name('tambah.surat-masuk');
    Route::post('/simpan-surat-masuk', 'SuratMasukController@store')->name('simpan.surat-masuk');
    Route::get('/edit-surat-masuk/{id}', 'SuratMasukController@edit')->name('edit.surat-masuk');
    Route::put('/update-surat-masuk/{id}', 'SuratMasukController@update')->name('update.surat-masuk');
    Route::delete('/hapus-surat-masuk/{id}', 'SuratMasukController@destroy')->name('hapus.surat-masuk');
    Route::get('/periode-surat-masuk', 'SuratMasukController@periode')->name('periode.surat-masuk');
    Route::get('/show-surat-masuk/{tgl_awal}/{tgl_akhir}', 'SuratMasukController@show');
    Route::get('/cetak-pdf-surat-masuk', 'SuratMasukController@cetakPDF');
    Route::get('/cetak-excel-surat-masuk', 'SuratMasukController@cetakExcel');

    //disposisi
    Route::get('/disposisi/json', 'DisposisiController@json');
    Route::get('/disposisi', 'DisposisiController@index')->name('disposisi');
    Route::get('/tambah-disposisi', 'DisposisiController@create')->name('tambah.disposisi');
    Route::post('/simpan-disposisi', 'DisposisiController@store')->name('simpan.disposisi');
    Route::get('/edit-disposisi/{id}', 'DisposisiController@edit')->name('edit.disposisi');
    Route::put('/update-disposisi/{id}', 'DisposisiController@update')->name('update.disposisi');
    Route::delete('/hapus-disposisi/{id}', 'DisposisiController@destroy')->name('hapus.disposisi');
    
    //surat keluar
    Route::get('/surat-keluar/json', 'SuratKeluarController@json');
    Route::get('/surat-keluar', 'SuratKeluarController@index')->name('surat-keluar');
    Route::get('/tambah-surat-keluar', 'SuratKeluarController@create')->name('tambah.surat-keluar');
    Route::post('/simpan-surat-keluar', 'SuratKeluarController@store')->name('simpan.surat-keluar');
    Route::get('/edit-surat-keluar/{id}', 'SuratKeluarController@edit')->name('edit.surat-keluar');
    Route::put('/update-surat-keluar/{id}', 'SuratKeluarController@update')->name('update.surat-keluar');
    Route::delete('/hapus-surat-keluar/{id}', 'SuratKeluarController@destroy')->name('hapus.surat-keluar');
    Route::get('/periode-surat-keluar', 'SuratKeluarController@periode')->name('periode.surat-keluar');
    Route::get('/show-surat-keluar/{tgl_awal}/{tgl_akhir}', 'SuratKeluarController@show');
    Route::get('/cetak-pdf-surat-keluar', 'SuratKeluarController@cetakPDF');
    Route::get('/cetak-excel-surat-keluar', 'SuratKeluarController@cetakExcel');

    
});


Route::group(['middleware' => ['auth','ceklevel:admin']], function () {
    //USERS
    Route::get('/users/json', 'UserController@json');
    Route::get('/users', 'UserController@index')->name('users');
    Route::get('/tambah-user', 'UserController@create')->name('tambah.user');
    Route::post('/simpan-user', 'UserController@store')->name('simpan.user');
    Route::get('/edit-user/{id}', 'UserController@edit')->name('edit.user');
    Route::put('/update-user/{id}', 'UserController@update')->name('update.user');
    Route::delete('/hapus-user/{id}', 'UserController@destroy')->name('hapus.user');
    Route::get('/ganti-password-user/{id}', 'UserController@gantiPassword')->name('gantipassword.user');

    //PEGAWAI
    Route::get('/pegawai', 'HomeController@pegawai')->name('pegawai');
    Route::get('/data-pegawai/json', 'PegawaiController@json');
    Route::get('/data-pegawai', 'PegawaiController@index')->name('data.pegawai');
    Route::get('/tambah-pegawai', 'PegawaiController@create')->name('tambah.pegawai');
    Route::post('/simpan-pegawai', 'PegawaiController@store')->name('simpan.pegawai');
    Route::get('/edit-pegawai/{nippos}', 'PegawaiController@edit')->name('edit.pegawai');
    Route::put('/update-pegawai/{nippos}', 'PegawaiController@update')->name('update.pegawai');
    Route::delete('/hapus-pegawai/{nippos}', 'PegawaiController@destroy')->name('hapus.pegawai');

    //BAGIAN
    Route::get('/bagian/json', 'BagianController@json');
    Route::get('/bagian', 'BagianController@index')->name('bagian');
    Route::get('/tambah-bagian', 'BagianController@create')->name('tambah.bagian');
    Route::post('/simpan-bagian', 'BagianController@store')->name('simpan.bagian');
    Route::get('/edit-bagian/{id}', 'BagianController@edit')->name('edit.bagian');
    Route::put('/update-bagian/{id}', 'BagianController@update')->name('update.bagian');
    Route::delete('/hapus-bagian/{id}', 'BagianController@destroy')->name('hapus.bagian');

    //JABATAN 
    Route::get('/jabatan/json', 'JabatanController@json');
    Route::get('/jabatan', 'JabatanController@index')->name('jabatan');
    Route::get('/tambah-jabatan', 'JabatanController@create')->name('tambah.jabatan');
    Route::post('/simpan-jabatan', 'JabatanController@store')->name('simpan.jabatan');
    Route::get('/edit-jabatan/{id}', 'JabatanController@edit')->name('edit.jabatan');
    Route::put('/update-jabatan/{id}', 'JabatanController@update')->name('update.jabatan');
    Route::delete('/hapus-jabatan/{id}', 'JabatanController@destroy')->name('hapus.jabatan');
});

