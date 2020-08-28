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
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/users', function () {
    return view('users');
});

Route::get('/scanner', function () {
    return view('scanner');
});

Route::get('/penerimaan', function () {
    return view('penerimaan');
});

Route::get('/pengeluaran', function () {
    return view('pengeluaran');
});

Route::get('/mapping', function () {
    return view('mapping');
});

Route::get('/cekstok', function () {
    return view('cekstok');
});

Route::get('/ubah-password', function () {
    return view('ubah-password');
});