<?php

Route::get('/', 'pengajar\PengajarController@index')->name('pengajar');
Route::get('/login', 'pengajar\PengajarLoginController@showLoginForm')->name('pengajar.login');
Route::post('/login', 'pengajar\PengajarLoginController@login')->name('pengajar.login');
Route::get('/daftar', 'pengajar\PengajarDaftarController@daftar')->name('pengajar.daftar');
Route::post('/daftar', 'pengajar\PengajarDaftarController@create')->name('pengajar.daftar');
Route::post('/logout', 'pengajar\PengajarLoginController@logout')->name('pengajar.logout');
