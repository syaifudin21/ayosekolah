<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $fillable = ['foto', 'caption', 'status_user', 'id_user', 'album', 'id_album', 'status'];
}
