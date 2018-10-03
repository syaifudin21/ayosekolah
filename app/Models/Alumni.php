<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
	protected $fillable = [
        'id_siswa','pesan','kesan','status','instanasi','foto'
    ];
}
