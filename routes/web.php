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

//Home
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

//Users
Route::get('/users', function () {
    return view('users');
});

//Blok Gudang
Route::get('/blok','BlokController@index')->name('blok.index');
Route::get('/blok-add','BlokController@create')->name('blok.create');
Route::get('/blok/d/{id}','BlokController@destroy')->name('blok.destroy');
Route::get('/blok-edit/{id}','BlokController@update')->name('blok.edit');
Route::post('/blok/save','BlokController@store')->name('blok.store');

//Scanner
Route::get('/scanner', function () {
    return view('scanner');
});

//Penerimaan
Route::get('/penerimaan', function () {
    return view('penerimaan');
});

//Pengeluaran
Route::get('/pengeluaran', function () {
    return view('pengeluaran');
});

//Mapping Gudang
Route::get('/mapping', function () {
    return view('mapping');
});

//Cek Stok
Route::get('/cekstok', function () {
    return view('cekstok');
});

//Ubah Password
Route::get('/ubah-password', function () {
    return view('ubah-password');
});