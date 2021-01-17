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
});
Route::get('/layout', function () {
    return view('admin.layout');
});
