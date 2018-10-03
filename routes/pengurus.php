<?php

Route::get('/', 'pengurus\PengurusController@index')->name('pengurus');
Route::get('/login', 'pengurus\PengurusLoginController@showLoginForm')->name('pengurus.login');
Route::post('/login', 'pengurus\PengurusLoginController@login')->name('pengurus.login');
Route::post('/logout', 'pengurus\PengurusLoginController@logout')->name('pengurus.logout');

Route::get('/profil', 'pengurus\PengurusController@profil')->name('pengurus.profil');
Route::put('/profil', 'pengurus\PengurusController@update')->name('pengurus.update');

Route::get('/pengajar', 'pengurus\PengajarController@index');
Route::get('/pengajar/{id}', 'pengurus\PengajarController@profil');
Route::put('/pengajar', 'pengurus\PengajarController@update')->name('pengurus.pengajar.update');
Route::put('/pengajar/terima', 'pengurus\PengajarController@terima')->name('pengurus.pengajar.terima');

Route::get('/siswabaru/pengumuman', 'layanan\PengumumanController@pengurus_siswabaru');
Route::get('/siswabaru/pengumuman/{id}/{slug}', 'layanan\PengumumanController@pengurus_id');
Route::get('/siswabaru/pengumuman/update/{id}/{slug}', 'layanan\PengumumanController@pengurus_update');

Route::get('/pengurus/pengumuman', 'layanan\PengumumanController@pengurus_pengurus');
Route::get('/pengurus/pengumuman/{id}/{slug}', 'layanan\PengumumanController@pengurus_pengurus_id');
Route::get('/pengurus/pengumuman/update/{id}/{slug}', 'layanan\PengumumanController@pengurus_pengurus_update');

Route::get('/siswabaru', 'pengurus\PengurusController@baru');
Route::get('/siswabaru/{id}', 'pengurus\PengurusController@siswaprofil');
Route::put('/siswabaru', 'pengurus\PengurusController@siswaupdate')->name('pengurus.siswabaru.update');
Route::put('/siswabaru/terima', 'pengurus\PengurusController@siswaterima')->name('pengurus.siswabaru.terima');

Route::get('/masukan', 'pengurus\PengurusController@masukan');
Route::delete('/masukan/{id}', 'pengurus\PengurusController@masukanhapus');

Route::get('/kelas', 'pengurus\KelasController@kelas');
Route::get('/kelas/lihat/{id}', 'pengurus\KelasController@lihat');
Route::get('/kelas/update/{id}', 'pengurus\KelasController@edit');
// Route::post('/kelas/tambah', 'pengurus\KelasController@tambah')->name('kelas.tambah');
// Route::put('/kelas/update', 'pengurus\KelasController@update')->name('kelas.update');
Route::delete('/kelas/delete/{id}', 'pengurus\KelasController@delete');
Route::get('/kelas/mapel/{id}', 'pengurus\KelasController@mapel');
Route::post('/kelas/mapel/tambah', 'pengurus\KelasController@mapeltambah')->name('kelasmapel.tambah');
Route::put('/kelas/mapel/update', 'pengurus\KelasController@mapelupdate')->name('kelasmapel.update');
Route::delete('kelas/mapel/delete/{id}', 'pengurus\KelasController@mapeldelete');
Route::get('/kelas/load/{id}', 'pengurus\KelasController@datamapel');
Route::get('/ta/load/{id}', 'pengurus\KelasController@datata');
Route::post('/kelas/mapel/load', 'pengurus\KelasController@mapelload')->name('loadmapel.tambah');

// Route::get('/mapel', 'pengurus\MapelController@mapel');
// Route::get('/mapel/lihat/{id}', 'pengurus\MapelController@lihat');
// Route::get('/mapel/update/{id}', 'pengurus\MapelController@edit');
// Route::post('/mapel/tambah', 'pengurus\MapelController@tambah')->name('mapel.tambah');
// Route::put('/mapel/update', 'pengurus\MapelController@update')->name('mapel.update');
// Route::delete('/mapel/delete/{id}', 'pengurus\MapelController@delete');

Route::get('/data/pengajar', 'pengurus\PengajarController@datapengajar');

Route::get('/album', 'layanan\AlbumController@pengurus');
Route::get('/album/{id}', 'layanan\AlbumController@pengurus_albumid');
Route::get('/album/edit/{id}', 'layanan\AlbumController@pengurus_edit');

Route::get('/foto/{id}', 'layanan\FotoController@pengurus');
Route::get('/foto/edit/{id}', 'layanan\FotoController@edit');

Route::get('/artikel', 'layanan\ArtikelController@pengurus');
Route::get('/artikel/{id}', 'layanan\ArtikelController@pengurus_artikelid');
Route::get('/artikel/edit/{id}', 'layanan\ArtikelController@pengurus_edit');

Route::get('/prestasi', 'pengurus\PrestasiController@index');
Route::post('/prestasi', 'pengurus\PrestasiController@store')->name('prestasi.tambah');
Route::get('/prestasi/{id}', 'pengurus\PrestasiController@prestasiid');
Route::get('/prestasi/edit/{id}', 'pengurus\PrestasiController@edit');
Route::put('/prestasi/update', 'pengurus\PrestasiController@update')->name('prestasi.update');
Route::delete('/prestasi/{id}', 'pengurus\PrestasiController@delete');

Route::get('pengurus/agenda', 'layanan\AgendaController@pengurus');
Route::get('pengurus/agenda/update/{id}', 'layanan\AgendaController@pengurus_update');