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


Route::middleware('auth')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::prefix('parkir')->group(function(){
        Route::resource('masuk', 'ParkirController')->only('index','store');
        Route::resource('keluar', 'TransaksiController')->only('index','store');
    });
    Route::get('cetak/tiket/{id}', 'CetakController@tiketParkir')->name('cetak.parkir');
    Route::middleware('check.role:admin')->group(function(){
        Route::resource('upah', 'UpahController')->except('create', 'edit');
        Route::resource('karyawan', 'UserController')->except('create', 'edit');
        Route::resource('kendaraan', 'JenisKendaraanConroller')->except('create', 'edit');
        Route::get('laporan', 'HomeController@laporan')->name('laporan');
        Route::post('laporan', 'HomeController@laporanCreate')->name('laporan.create');
    });
});
Auth::routes();
