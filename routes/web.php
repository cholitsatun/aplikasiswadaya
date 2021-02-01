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

Route::get('/login', 'LoginController@index')->middleware('guest');
Route::post('/login', 'LoginController@post');

Route::group(['middleware' => 'admin'], function(){
    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard.index');
    Route::get('/bahanbaku', 'BahanBakuController@index')->name('admin.bahanbaku.index');
    Route::get('/inputbahan', 'InputBahanController@index')->name('admin.inputbahan.index');

    //bahan baku
    Route::get('/bahanbaku/tambah', 'BahanBakuController@create');
    Route::post('/bahanbaku', 'BahanBakuController@store');

    Route::post('/bahanbaku', 'BahanBakuController@store');
    Route::get('/bahanbaku/{id}/edit', 'BahanBakuController@edit')->name('admin.bahanbaku.edit');
    Route::put('/bahanbaku/{id}', 'BahanBakuController@update')->name('admin.bahanbaku.update');
    Route::delete('/bahanbaku/{id}', 'BahanBakuController@destroy')->name('admin.bahanbaku.destroy');
    

    //input bahan baku
    Route::get('/inputbahan/tambah', 'InputBahanController@create')->name('admin.inputbahan.tambah');
    Route::post('/inputbahan', 'InputBahanController@store')->name('admin.inputbahan.store');
    Route::get('/inputbahan/{id}/edit', 'InputBahanController@edit')->name('admin.inputbahan.edit');
    Route::put('/inputbahan/{id}', 'InputBahanController@update')->name('admin.inputbahan.update');
    Route::delete('/inputbahan/{id}', 'InputBahanController@destroy')->name('admin.inputbahan.destroy');

    //laporan
    Route::get('/laporan', 'InputBahanController@cetak_pdf')->name('admin.laporan.pdf');
    Route::get('/laporan/cetak_pdf/{daterange}', 'InputBahanController@ReportPdf')->name('admin.laporan.cetak_pdf');

    //penjualan
    Route::get('/penjualan', 'PenjualanController@index')->name('admin.penjualan.index');
    Route::get('/penjualan/tambah', 'PenjualanController@create')->name('admin.penjualan.tambah');
    Route::post('/penjualan', 'PenjualanController@store')->name('admin.penjualan.store');
    Route::get('/penjualan/{id}/edit', 'PenjualanController@edit')->name('admin.penjualan.edit');
    Route::put('/penjualan/{id}', 'PenjualanController@update')->name('admin.penjualan.update');
    Route::delete('/penjualan/{id}', 'PenjualanController@destroy')->name('admin.penjualan.destroy');

    // Produk
    Route::get('/produk', 'ProdukController@index')->name('admin.produk.index');

    // Input Produk
    Route::get('/input_produk', 'InputProdukController@index')->name('admin.input_produk.index');
    Route::get('/input_produk/tambah', 'InputProdukController@create')->name('admin.input_produk.tambah');
    Route::post('/input_produk', 'InputProdukController@store')->name('admin.input_produk.store');
    Route::get('/input_produk/{id}/edit', 'InputProdukController@edit')->name('admin.input_produk.edit');
    Route::put('/input_produk/{id}', 'InputProdukController@update')->name('admin.input_produk.update');
    Route::delete('/input_produk/{id}', 'InputProdukController@destroy')->name('admin.input_produk.destroy');


});
Route::get('/layout', function () {
    return view('admin.layout');
});
