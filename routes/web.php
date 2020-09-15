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
})->middleware('login');

// login & logout auth
Route::get('/login','UsersController@login');
Route::post('/login','UsersController@prosesLogin')->name('users.proses');
Route::get('/logout ','UsersController@logout');

// users
Route::get('/users', function () {
    return view('users');
})->middleware('login');

// blok
Route::get('/blok','BlokController@index')->name('blok.index')->middleware('login');
Route::get('/blok-add','BlokController@create')->name('blok.create')->middleware('login');
Route::get('/blok/d/{id}','BlokController@destroy')->name('blok.destroy')->middleware('login');
Route::get('/blok/u/{id}','BlokController@edit')->name('blok.edit')->middleware('login');
Route::post('/blok/save','BlokController@store')->name('blok.store')->middleware('login');
Route::post('/blok/update','BlokController@update')->name('blok.update')->middleware('login');

// tingkat
Route::get('/tingkat','TingkatController@index')->name('tingkat.index')->middleware('login');
Route::get('/tingkat-add','TingkatController@create')->name('tingkat.create')->middleware('login');
Route::get('/tingkat/d/{id}','TingkatController@destroy')->name('tingkat.destroy')->middleware('login');
Route::get('/tingkat/u/{id}','TingkatController@edit')->name('tingkat.edit')->middleware('login');
Route::post('/tingkat/save','TingkatController@store')->name('tingkat.store')->middleware('login');
Route::post('/tingkat/update','TingkatController@update')->name('tingkat.update')->middleware('login');

// plong
Route::get('/plong','PlongController@index')->name('plong.index')->middleware('login');
Route::get('/plong-add','PlongController@create')->name('plong.create')->middleware('login');
Route::get('/plong/d/{id}','PlongController@destroy')->name('plong.destroy')->middleware('login');
Route::get('/plong/u/{id}','PlongController@edit')->name('plong.edit')->middleware('login');
Route::post('/plong/save','PlongController@store')->name('plong.store')->middleware('login');
Route::post('/plong/update','PlongController@update')->name('plong.update')->middleware('login');

// barang
Route::get('/barang','BarangController@index')->name('barang.index')->middleware('login');

// mesin
Route::get('/mesin','MesinController@index')->name('mesin.index')->middleware('login');

// bagian
Route::get('/bagian','BagianController@index')->name('bagian.index')->middleware('login');

// konversi
Route::get('/konversi','KonversiController@index')->name('konversi.index')->middleware('login');

// satuan
Route::get('/satuan','SatuanController@index')->name('satuan.index')->middleware('login');

// supplier
Route::get('/supplier','SupplierController@index')->name('supplier.index')->middleware('login');

// scanner
Route::get('/scanner', function () {
    return view('scanner');
})->middleware('login');

// penerimaan
Route::get('/penerimaan', function () {
    return view('penerimaan');
})->middleware('login');

// pengeluaran
Route::get('/pengeluaran', function () {
    return view('pengeluaran');
})->middleware('login');

// mapping
Route::get('/mapping', function () {
    return view('mapping');
})->middleware('login');

// cek stok
Route::get('/cekstok', function () {
    return view('cekstok');
})->middleware('login');

// ubah password
Route::get('/ubah-password', function () {
    return view('ubah-password');
})->middleware('login');

// generate qrcode
Route::get('qr-code-g', function () {
    $tgl = date('ymd').'221';

    QrCode::size(0)
            ->format('svg')
            ->generate($tgl, public_path('qrcode/'.$tgl.'.svg'));
    return view('qrCode', ['qrcode' => $tgl]);
})->middleware('login');