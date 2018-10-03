<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = ['agenda','waktu','keterangan','status_tampil', 'status', 'status_public', 'status_user','id_user'];
    
}
