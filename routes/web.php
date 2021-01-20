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
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/bahanbaku', 'BahanBakuController@index');

    //tambah bahan baku
    Route::get('/bahanbaku/tambah', 'BahanBakuController@create');
    Route::post('/bahanbaku', 'BahanBakuController@store');

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
