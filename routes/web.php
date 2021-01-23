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
    Route::get('/inputbahan/cetak_pdf', 'InputBahanController@cetak_pdf');

    //penjualan
    Route::get('/penjualan', 'PenjualanController@index');
    Route::get('/penjualan/tambah', 'PenjualanController@create')->name('admin.inputbahan.tambah');
    Route::post('/penjualan', 'PenjualanController@store')->name('admin.penjualan.store');


});
Route::get('/layout', function () {
    return view('admin.layout');
});
