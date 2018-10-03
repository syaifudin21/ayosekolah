<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $fillable = ['judul', 'slug_judul', 'text_pembuka','tag', 'artikel', 'lampiran', 'status_user', 'id_user', 'status'];
}
