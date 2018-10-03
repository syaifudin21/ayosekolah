<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil_sekolah extends Model
{
	protected $fillable = [
        'nama_sekolah','nama_singkat_sekolah','npsn', 'jenjang','status', 'alamat', 'kode_pos', 'maps', 'sk', 'sk_izin', 'tgl_sk', 'status_kepemilikan', 'luastanah_milik', 'luastanah_bukan', 'nama_wajib_pajak', 'npwp', 'no_telp', 'no_fax', 'email', 'website', 'waktu_sekolah', 'menerima_bos', 'sertifikasi_iso', 'sumber_listrik', 'daya_listrik', 'akses_internet', 'kepala_sekolah', 'akriditasi', 'kurikulum', 'logo'
    ];
}
