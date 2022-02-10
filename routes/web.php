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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'dashboard'], function(){
    route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
});

Route::group(['prefix' => 'daftar-barang'], function(){
    route::get('daftar-barang', 'DaftarBarangController@index')->name('daftarbarang.index');
    route::get('create','DaftarBarangController@create')->name('daftarbarang.create');
    route::get('edit/{items}', 'DaftarBarangController@edit')->name('daftarbarang.edit');
    route::post('store','DaftarBarangController@store')->name('daftarbarang.store');
    route::patch('update/{items}','DaftarBarangController@update')->name('daftarbarang.update');
    route::delete('delete/{items}', 'DaftarBarangController@destroy')->name('daftarbarang.destroy');
});

Route::group(['prefix' => 'transaksi'], function(){
    route::get('/transaksi', 'TransaksiController@index')->name('transaksi.index');
    route::get('create/{transactions}','TransaksiController@create')->name('transaksi.create');
    route::post('store/{transactions}','TransaksiController@store')->name('transaksi.store');
});

Route::group(['prefix' => 'pengembalian'], function(){
    route::get('pengembalian', 'PengembalianController@index')->name('pengembalian.index');
    route::get('create/{id}', 'PengembalianController@create')->name('pengembalian.create');
    route::post('store/{transaksi}','PengembalianController@store')->name('pengembalian.store');
});

Route::group(['prefix' => 'sms-gateway'], function(){
    route::post('post/{transactions}','smsController@store')->name('sms');
});