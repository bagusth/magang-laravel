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
    return view('auth.login');
});

// First Display
Route::get('/index', 'DashboardController@index');
// Choose ur destiny
Route::get('/data-siswa', 'SiswaController@index');
Route::get('/data-tagihan', 'TagihanController@index');
Route::get('/data-pembayaran', 'PembayaranController@index');

// Route di Siswa
Route::get('/data-siswa/tambah', 'SiswaController@tambah')->name('tambah');
Route::post('/store','SiswaController@store');
Route::get('/data-siswa/edit/{nim}', 'SiswaController@edit');
Route::put('/data-siswa/update/{nim}', 'SiswaController@update');
Route::get('/data-siswa/delete/{nim}', 'SiswaController@delete');
Route::post('/data-siswa/action', 'SiswaController@action')->name('siswa.action');

// Route di Tagihan
Route::get('/data-tagihan/tambah-tagihan', 'TagihanController@tambah');
Route::post('/data-tagihan/store', 'TagihanController@store');
Route::post('/data-tagihan/storeAdd', 'TagihanController@storeAdd');
Route::get('/data-tagihan/edit-tagihan/{no_tagihan}', 'TagihanController@edit');
Route::put('/data-tagihan/{no_tagihan}', 'TagihanController@update');
Route::patch('/data-tagihan/{kode_jenis}', 'TagihanController@updateAdd');
Route::get('/data-tagihan/delete/{no_tagihan}', 'TagihanController@delete');
Route::get('/data-tagihan/deleteAdd/{nilai}', 'TagihanController@deleteAdd');

// Route di Pembayaran
Route::get('/data-pembayaran/tambah-ambyar', 'PembayaranController@create');
Route::post('/store', 'PembayaranController@store');
Route::post('data-pembayaran/storeBayar', 'PembayaranController@storeBayar');
Route::get('/data-pembayaran/edit/{no_bayar}', 'PembayaranController@edit');
Route::put('/data-pembayaran/update/{nim}', 'PembayaranController@update');
Route::get('/data-pembayaran/delete/{nim}', 'PembayaranController@destroy');


Auth::routes();
