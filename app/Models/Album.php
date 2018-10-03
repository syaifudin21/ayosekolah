<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['nama', 'slug_album', 'deskripsi', 'tgl_kegiatan', 'id_prestasi', 'status_user', 'id_user', 'status'];
}