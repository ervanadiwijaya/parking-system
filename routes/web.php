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
Route::get('karyawan', 'HomeController@index')->name('home');
Route::get('kendaraan', 'HomeController@index')->name('home');
Route::prefix('parkir')->group(function(){
    Route::get('masuk', 'HomeController@index')->name('home');
    Route::get('keluar', 'HomeController@index')->name('home');
});
Route::get('laporan', 'HomeController@index')->name('home');
Auth::routes();
