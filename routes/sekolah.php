<?php

Route::get('/', 'sekolah\SekolahController@index')->name('sekolah');
Route::get('/login', 'sekolah\SekolahLoginController@showLoginForm')->name('sekolah.login');
Route::post('/login', 'sekolah\SekolahLoginController@login')->name('sekolah.login');
Route::get('/daftar', 'sekolah\SekolahDaftarController@daftar')->name('sekolah.daftar');
Route::post('/daftar', 'sekolah\SekolahDaftarController@create')->name('sekolah.daftar');
Route::post('/logout', 'sekolah\SekolahLoginController@logout')->name('sekolah.logout');

Route::get('/tahunajaran', 'sekolah\TahunAjaranController@tahunajaran');
Route::post('/tahunajaran', 'sekolah\TahunAjaranController@tatambah')->name('tahunajaran.tambah');
Route::get('/tahunajaran/id/{id}', 'sekolah\TahunAjaranController@taid');
Route::put('/tahunajaran', 'sekolah\TahunAjaranController@taupdate')->name('tahunajaran.update');

Route::get('/kelas/{id_ta}', 'sekolah\KelasController@kelas');
Route::post('/kelas', 'sekolah\KelasController@kelasstore')->name('kelas.tambah');
Route::get('/kelas/id/{id}', 'sekolah\KelasController@kelasid');
Route::get('/kelas/update/{id}', 'sekolah\KelasController@kelasupdateid');
Route::put('/kelas', 'sekolah\KelasController@kelasupdate')->name('kelas.update');

Route::get('/kurikulum', 'sekolah\TahunAjaranController@kurikulum');
Route::post('/kurikulum', 'sekolah\TahunAjaranController@kurikulumstore')->name('kurikulum.tambah');
Route::get('/kurikulum/id/{id}', 'sekolah\TahunAjaranController@kurikulumid');
Route::put('/kurikulum', 'sekolah\TahunAjaranController@kurikulumupdate')->name('kurikulum.update');

Route::get('/jurusan/{id_kurikulum}', 'sekolah\TahunAjaranController@jurusan');
Route::post('/jurusan', 'sekolah\TahunAjaranController@jurusanstore')->name('jurusan.tambah');
Route::get('/jurusan/{id_kurikulum}/id/{id}', 'sekolah\TahunAjaranController@jurusanid');
Route::put('/jurusan', 'sekolah\TahunAjaranController@jurusanupdate')->name('jurusan.update');

Route::get('/tk/{id_jurusan}', 'sekolah\TahunAjaranController@tk');
Route::post('/tk', 'sekolah\TahunAjaranController@tkstore')->name('tk.tambah');
Route::get('/tk/{id_jurusan}/id/{id}', 'sekolah\TahunAjaranController@tkid');
Route::put('/tk', 'sekolah\TahunAjaranController@tkupdate')->name('tk.update');

Route::post('/jenismapel', 'sekolah\TahunAjaranController@jenismapelstore')->name('jenismapel.tambah');
Route::get('/jenismapel/id/{id}', 'sekolah\TahunAjaranController@jenismapelid');
Route::put('/jenismapel', 'sekolah\TahunAjaranController@jenismapelupdate')->name('jenismapel.update');

Route::get('/mapel/{id_tk}', 'sekolah\TahunAjaranController@mapel');
Route::post('/mapel', 'sekolah\TahunAjaranController@mapelstore')->name('mapel.tambah');
Route::get('/mapel/{id_tk}/id/{id}', 'sekolah\TahunAjaranController@mapelid');
Route::put('/mapel', 'sekolah\TahunAjaranController@mapelupdate')->name('mapel.update');
Route::delete('/mapel/delete/{id}', 'sekolah\TahunAjaranController@mapeldelete');

Route::get('/profil', 'sekolah\SekolahController@profil');
Route::put('/profil', 'sekolah\SekolahController@edit')->name('sekolah.edit');
Route::get('/pengurus', 'sekolah\SekolahController@pengurus');
Route::post('/pengurus', 'sekolah\SekolahController@storepengurus')->name('sekolah.pengurus.tambah');
Route::get('/pengurus/{id}', 'sekolah\SekolahController@pengurusid');
Route::get('/pengurus/update/{id}', 'sekolah\SekolahController@pengurusedit');
Route::put('/pengurus/update', 'sekolah\SekolahController@pengurusupdate')->name('sekolah.pengurus.update');
Route::delete('/pengurus/delete/{id}', 'sekolah\SekolahController@deletepengurus');

Route::get('/atribut', 'sekolah\AtributController@index');
Route::post('/atribut', 'sekolah\AtributController@store')->name('atribut.tambah');
Route::get('/atribut/{id}', 'sekolah\AtributController@atributid');
Route::get('/atribut/update/{id}', 'sekolah\AtributController@edit');
Route::put('/atribut/update', 'sekolah\AtributController@update')->name('atribut.update');
Route::delete('/atribut/delete/{id}', 'sekolah\AtributController@delete');

Route::get('/ekstrakurikuler', 'sekolah\EkstrakurikulerController@index');
Route::post('/ekstrakurikuler', 'sekolah\EkstrakurikulerController@store')->name('ekstrakurikuler.tambah');
Route::get('/ekstrakurikuler/{id}', 'sekolah\EkstrakurikulerController@atributid');
Route::get('/ekstrakurikuler/update/{id}', 'sekolah\EkstrakurikulerController@edit');
Route::put('/ekstrakurikuler/update', 'sekolah\EkstrakurikulerController@update')->name('ekstrakurikuler.update');
Route::delete('/ekstrakurikuler/delete/{id}', 'sekolah\EkstrakurikulerController@delete');

Route::get('/fasilitas', 'sekolah\\FasilitasController@index');
Route::post('/fasilitas', 'sekolah\FasilitasController@store')->name('fasilitas.tambah');
Route::get('/fasilitas/{id}', 'sekolah\FasilitasController@atributid');
Route::get('/fasilitas/update/{id}', 'sekolah\FasilitasController@edit');
Route::put('/fasilitas/update', 'sekolah\FasilitasController@update')->name('fasilitas.update');
Route::delete('/fasilitas/delete/{id}', 'sekolah\FasilitasController@delete');

Route::get('/album', 'layanan\AlbumController@sekolah');
