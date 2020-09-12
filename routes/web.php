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

// plong
Route::get('/plong','PlongController@index')->name('plong.index');
Route::get('/plong-add','PlongController@create')->name('plong.create');
Route::get('/plong/d/{id}','PlongController@destroy')->name('plong.destroy');
Route::get('/plong/u/{id}','PlongController@edit')->name('plong.edit');
Route::post('/plong/save','PlongController@store')->name('plong.store');
Route::post('/plong/update','PlongController@update')->name('plong.update');

// tingkat
Route::get('/tingkat','TingkatController@index')->name('tingkat.index');
Route::get('/tingkat-add','TingkatController@create')->name('tingkat.create');
Route::get('/tingkat/d/{id}','TingkatController@destroy')->name('tingkat.destroy');
Route::get('/tingkat/u/{id}','TingkatController@edit')->name('tingkat.edit');
Route::post('/tingkat/save','TingkatController@store')->name('tingkat.store');
Route::post('/tingkat/update','TingkatController@update')->name('tingkat.update');

// barang
Route::get('/barang','BarangController@index')->name('barang.index');

// mesin
Route::get('/mesin','MesinController@index')->name('mesin.index');

// bagian
Route::get('/bagian','BagianController@index')->name('bagian.index');

// konversi
Route::get('/konversi','KonversiController@index')->name('konversi.index');

// satuan
Route::get('/satuan','SatuanController@index')->name('satuan.index');

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

Route::get('qr-code-g', function () {
    $tgl = date('ymd').'221';

    QrCode::size(0)
            ->format('svg')
            ->generate($tgl, public_path('qrcode/'.$tgl.'.svg'));
    return view('qrCode', ['qrcode' => $tgl]);
});