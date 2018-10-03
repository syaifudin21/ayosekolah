<?php 

Route::post('/album', 'layanan\AlbumController@store')->name('album.tambah');
Route::put('/album/update', 'layanan\AlbumController@update')->name('album.update');
Route::delete('/album/{id}', 'layanan\AlbumController@delete');

Route::post('/foto', 'layanan\FotoController@store')->name('foto.tambah');
Route::put('/foto', 'layanan\FotoController@update')->name('foto.update');
Route::delete('/foto/{id}', 'layanan\FotoController@delete');

Route::post('/artikel', 'layanan\ArtikelController@store')->name('artikel.tambah');
Route::put('/artikel/update', 'layanan\ArtikelController@update')->name('artikel.update');
Route::delete('/artikel/{id}', 'layanan\ArtikelController@delete');

Route::post('/pengumuman', 'layanan\PengumumanController@store')->name('pengumuman.tambah');
Route::put('/pengumuman/update', 'layanan\PengumumanController@update')->name('pengumuman.update');
Route::delete('/pengumuman/{id}', 'layanan\PengumumanController@delete');

Route::post('/agenda', 'layanan\AgendaController@store')->name('agenda.tambah');
Route::put('/agenda/update', 'layanan\AgendaController@update')->name('agenda.update');
Route::delete('/agenda/{id}', 'layanan\AgendaController@delete');
