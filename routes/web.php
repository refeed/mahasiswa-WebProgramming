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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/mahasiswa', 'MahasiswaController');

Route::get('/buku', 'BukuController@index');
Route::get('/buku/create', 'BukuController@create')->name('buku.create');
Route::post('/buku', 'BukuController@store')->name('buku.store');
Route::post('/buku/delete/{id}', 'BukuController@destroy')->name('buku.destroy');
Route::get('/buku/update/{id}', 'BukuController@update')->name('buku.update');
Route::post('/buku/update/{id}', 'BukuController@storeUpdate')->name('buku.storeUpdate');
