<?php

Route::get('/', 'siswa\SiswaController@index')->name('siswa');
Route::get('/login', 'siswa\SiswaLoginController@showLoginForm')->name('siswa.login');
Route::post('/login', 'siswa\SiswaLoginController@login')->name('siswa.login');
Route::get('/daftar', 'siswa\SiswaDaftarController@daftar')->name('siswa.daftar');
Route::post('/daftar', 'siswa\SiswaDaftarController@create')->name('siswa.daftar');
Route::post('/logout', 'siswa\SiswaLoginController@logout')->name('siswa.logout');

Route::get('/baru', 'siswa\SiswaController@baru')->name('baru');
