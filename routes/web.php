<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', 'HomeController@index')->name('home');
Route::get('karyawan', 'HomeController@index');
Route::resource('kendaraan', 'JenisKendaraanConroller')->except('create', 'edit');
Route::prefix('parkir')->group(function(){
    Route::get('masuk', 'HomeController@index');
    Route::get('keluar', 'HomeController@index');
});
Route::get('laporan', 'HomeController@index')->name('laporan');
Auth::routes();
