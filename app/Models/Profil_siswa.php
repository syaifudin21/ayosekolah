<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil_siswa extends Model
{
	protected $fillable = ['id_ta','no_induk', 'nama_lengkap', 'tgl', 'jk', 'nim', 'agama', 'alamat', 'tinggal', 'transportasi', 'nomor_hp', 'nama_ayah', 'nama_ibu', 'tgl_ayah', 'tgl_ibu', 'nomor_hp_ortu', 'pendidikan_ayah', 'pendidikan_ibu', 'pekerjaan_ayah', 'pekerjaan_ibu', 'alamat_ortu', 'penghasilan_ayah', 'penghasilan_ibu', 'keterangan_ayah', 'keterangan_ibu', 'tinggi', 'berat', 'jarak_sekolah', 'tempu_sekolah', 'anak_ke', 'jml_saudara', 'foto', 'akte', 'kps', 'ijazah', 'sekolah_asal', 'sekolah_alamat', 'sekolah_angkatan', 'nilai_test', 'diterima_kelas','minat_jurusan'];
}
