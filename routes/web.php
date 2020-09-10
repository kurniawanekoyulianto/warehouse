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

// home
Route::get('/', function () {
    return view('home');
});

Route::get('/login','UsersController@login');
Route::post('/login','UsersController@prosesLogin');
Route::get('/logout ','UsersController@logout');
//Route::redirect('/','/login');

Route::get('/daftar-users','UsersController@daftarUsers')->middleware('login');
Route::get('/tabel-users','UsersController@tabelUsers')->middleware('login');
Route::get('/blog-users','UsersController@blogUsers')->middleware('login');

// users
Route::get('/users', function () {
    return view('users');
});

// blok
Route::get('/blok','BlokController@index')->name('blok.index');
Route::get('/blok-add','BlokController@create')->name('blok.create');
Route::get('/blok/d/{id}','BlokController@destroy')->name('blok.destroy');
Route::get('/blok/u/{id}','BlokController@edit')->name('blok.edit');
Route::post('/blok/save','BlokController@store')->name('blok.store');
Route::post('/blok/update','BlokController@update')->name('blok.update');

// barang
Route::get('/barang','BarangController@index')->name('barang.index');

// mesin
Route::get('/mesin','MesinController@index')->name('mesin.index');

// scanner
Route::get('/scanner', function () {
    return view('scanner');
});

// penerimaan
Route::get('/penerimaan', function () {
    return view('penerimaan');
});

// pengeluaran
Route::get('/pengeluaran', function () {
    return view('pengeluaran');
});

// mapping
Route::get('/mapping', function () {
    return view('mapping');
});

// cek stok
Route::get('/cekstok', function () {
    return view('cekstok');
});

// ubah password
Route::get('/ubah-password', function () {
    return view('ubah-password');
});