<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = [
        'id_jurusan','id_ta','id_tingkatan_kelas','id_guru','kelas','deskripsi','tgl_buka','tgl_tutup','tgl_arsip','status'
    ];
}
