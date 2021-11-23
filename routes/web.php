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

Auth::routes([
    'register' => false,
    'reset' => false
]);

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/mahasiswa', 'MahasiswaController');

Route::get('/buku', 'BukuController@index')->name('buku.index');
Route::get('/buku/create', 'BukuController@create')->name('buku.create');
Route::post('/buku', 'BukuController@store')->name('buku.store');
Route::post('/buku/delete/{id}', 'BukuController@destroy')->name('buku.destroy');
Route::get('/buku/update/{id}', 'BukuController@update')->name('buku.update');
Route::post('/buku/update/{id}', 'BukuController@storeUpdate')->name('buku.storeUpdate');
Route::get('/buku/search', 'BukuController@search')->name('buku.search');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index')->name('admin.index');
Route::get('/admin/create', 'AdminController@create')->name('admin.create');
Route::post('/admin/create', 'AdminController@store')->name('admin.store');
Route::get('/admin/update/{id}', 'AdminController@update')->name('admin.update');
Route::post('/admin/update/{id}', 'AdminController@storeUpdate')->name('admin.storeUpdate');
Route::get('/admin/delete/{id}', 'AdminController@destroy')->name('admin.destroy');

Route::get('/galeri', 'GaleriController@index')->name('galeri.index');
Route::post('/galeri', 'GaleriController@store')->name('galeri.store');
Route::get('/galeri/create', 'GaleriController@create')->name('galeri.create');
Route::get('/galeri/edit/{id}', 'GaleriController@edit')->name('galeri.edit');
Route::post('/galeri/update/{id}', 'GaleriController@update')->name('galeri.update');
Route::post('/galeri/delete/{id}', 'GaleriController@destroy')->name('galeri.destroy');

Route::get('/detail-buku/{title}', 'BukuController@galbuku')->name('galeri.buku');
Route::get('/list-buku', 'BukuController@listBuku')->name('galeri.listbuku');
