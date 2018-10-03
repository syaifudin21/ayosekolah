<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $fillable = [
        'mapel','deskripsi','status', 'id_tingkat_kelas', 'id_jenis_mapel', 'urutan'
    ];
    public $timestamps = false;
}
