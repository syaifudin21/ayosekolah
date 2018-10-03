<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas_siswa extends Model
{
    protected $fillable = [
        'id_kelas','id_siswa','status'
    ];
}
