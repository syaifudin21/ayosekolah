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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/daftar', 'HomeController@daftar')->name('daftar');
Route::post('/daftar', 'siswa\SiswaDaftarController@tambah')->name('siswa.baru');
Route::get('/tenaga-pengajar', 'HomeController@pengajar');
Route::get('/blog', 'HomeController@blog');
Route::get('/artikel/{id}/{slug}', 'HomeController@artikel');

Route::get('/fasilitas', 'HomeController@fasilitas');
Route::get('/profil', 'HomeController@profil');
Route::get('/pengumuman', 'HomeController@pengumuman');
Route::get('/agenda', 'HomeController@agenda');
Route::get('/ekstrakurikuler', 'HomeController@ekstrakurikuler');
Route::get('/prestasi', 'HomeController@prestasi');
Route::get('/galeri', 'HomeController@galeri');
Route::get('/album/{id}/{slug}', 'HomeController@album');
Route::get('/tatatertib', 'HomeController@tatatertib');
Route::get('/brosur', 'HomeController@brosur');
Route::get('/hasil-seleksi', 'HomeController@carihasil');
Route::post('/hasil-seleksi', 'HomeController@hasilseleksi')->name('cek.lolos');
Route::get('/alur-pendaftaran-online', 'HomeController@alur');
Route::post('/masukkan', 'HomeController@storemasukan')->name('masukkan.baru');

