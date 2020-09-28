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
Route::get('/plong-print/{id}','PlongController@printQrcode')->name('plong.print')->middleware('login');

// realisasi
Route::get('/real','RealController@index')->name('real.index')->middleware('login');

// transaksi BPB
Route::get('/bpb','TransaksiController@bpb')->name('bpb.index')->middleware('login');
Route::get('/bpb/{nomor}/{kode}','TransaksiController@nomorbpb')->name('bpb.edit')->middleware('login');
Route::post('/bpb/save', 'TransaksiController@saveMapping')->name('bpb.save')->middleware('login');
Route::get('/bpb-print/{nomor_transaksi}','TransaksiController@printQRCode')->name('bpb.print')->middleware('login');

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

// pengeluaran
Route::get('/pengeluaran','PengeluaranController@index')->name('pengeluaran.index')->middleware('login');
Route::get('/pengeluaran/{nomor}/{kode}','PengeluaranController@nomorpmbp')->name('pengeluaran.edit')->middleware('login');

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

//temporary cek ID
Route::get('/cekid', function () {
    $cek_last_id = DB::select("SELECT max(id_barcode) FROM tbl_gd_barcode");
    $ldate = substr($cek_last_id['0']->max, 0, 6);

    if ($ldate == date('ymd')){
        
    } else {
        DB::select("ALTER SEQUENCE id_gd_qrcode_seq RESTART WITH 1");
        return 'tidak sama';
    }
});    

// temporary cek
Route::get('/cek', function () {
    ini_set('max_execution_time', 180); //3 minutes execution time
    DB::disableQueryLog(); //disable log query
    
    for($i = 1; $i<=1000; $i++){
        // insert tbl_barcode
        DB::table('tbl_gd_barcode_test_bulk')->insert([
            'id_barcode' => 2009230000316,
            'tanggal_barcode' => '2020-09-23 15:21:25',
            'nomor_transaksi' => '6382020919',
            'kode_barang' => 'AA632003060125',
            'qrcode' => 'UAA632009230000316',
            'id_user' => 3818,
            'ip_address' => '192.168.1.230',
            'lastupdate' => '2020-09-23 15:21:25',
            'qty_fisik' => 1, // karena insert per row jadi qty fisik 1 semua
            'satuan_fisik' => 'PCS',
            'qty_ukur' => 99000,
            'satuan_ukur' => 'PCS',
            'jns_qrcode' => 'U',
            'id_gd_plong' => 123421,
            'kode_bagian' => 'IA90123',
            'id_keperluan' => 123,
            'keterangan' => 'COBA',
        ]);
    }
});