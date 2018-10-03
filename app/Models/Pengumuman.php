<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = 'pengumumans';
	protected $fillable = ['nama_pengumuman', 'isi','slug_pengumuman' , 'lampiran', 'waktu_mulai', 'waktu_selesai', 'status_user', 'id_user', 'objek', 'id_objek', 'id_latih', 'status'];
}
