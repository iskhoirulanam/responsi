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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin', 'HomeController@admin')->name('admin.home')->middleware('is_admin');
Route::get('operator', 'HomeController@index')->name('operator.home')->middleware('is_admin');


Route::get('operator/produk', 'ProdukController@index');
// Route::get('operator/produk/tambah-produk', 'ProdukopController@tambah');
// Route::post('operator/produk/insert-produk', 'ProdukopController@insert');
// Route::get('admin/produk/edit-produk/{id}', 'ProdukopController@edit');
// Route::post('admin/produk/update-produk/{id}', 'ProdukopController@update');
// Route::get('admin/produk/hapus-produk/{id}', 'ProdukopController@hapus');

Route::get('admin/produk', 'ProdukController@index');
Route::get('admin/produk/tambah-produk', 'ProdukController@tambah');
Route::post('admin/produk/insert-produk', 'ProdukController@insert');
Route::get('admin/produk/edit-produk/{id}', 'ProdukController@edit');
Route::post('admin/produk/update-produk/{id}', 'ProdukController@update');
Route::get('admin/produk/hapus-produk/{id}', 'ProdukController@hapus');

Route::get('admin/kategori', 'KategoriController@index');
Route::get('admin/kategori/tambah-kategori', 'KategoriController@tambah');
Route::post('admin/kategori/insert-kategori', 'KategoriController@insert');
Route::get('admin/kategori/edit-kategori/{id}', 'KategoriController@edit');
Route::get('admin/kategori/hapus-kategori/{id}', 'KategoriController@hapus');
Route::post('admin/kategori/update-kategori/{id}', 'KategoriController@update');

Route::get('admin/merek', 'MerekController@index');
Route::get('admin/merek/tambah-merek', 'MerekController@tambah');
Route::post('admin/merek/insert-merek', 'MerekController@insert');
Route::get('admin/merek/edit-merek/{id}', 'MerekController@edit');
Route::get('admin/merek/hapus-merek/{id}', 'MerekController@hapus');
Route::post('admin/merek/update-merek/{id}', 'MerekController@update');
