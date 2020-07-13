<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::resource('karyawan', 'UserController')->except('create', 'edit');
Route::resource('kendaraan', 'JenisKendaraanConroller')->except('create', 'edit');
Route::prefix('parkir')->group(function(){
    Route::resource('masuk', 'ParkirController')->except('create','edit');
    Route::resource('keluar', 'TransaksiController')->except('create','edit');
});
Route::get('laporan', 'HomeController@index')->name('laporan');
Auth::routes();
