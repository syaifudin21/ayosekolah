<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $fillable = [
        'id_kurikulum','jurusan', 'deskripsi', 'foto'
    ];
    public $timestamps = false;
}
