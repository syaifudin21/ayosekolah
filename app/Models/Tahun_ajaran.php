<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tahun_ajaran extends Model
{
	protected $fillable = [
        'tahun_ajaran','tgl_pendaftaran','tgl_test','tgl_pengumuman','tgl_daftar_ulang','jadwal','brosur','status'
    ];
}
