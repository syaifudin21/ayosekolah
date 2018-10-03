<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jenis_mapel extends Model
{
    protected $fillable = [
        'id_jurusan','jenis_mapel'
    ];
    public $timestamps = false;
}
