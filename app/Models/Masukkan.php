<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Masukkan extends Model
{
	use SoftDeletes;
    protected $fillable = ['nama', 'hp', 'email','pesan'];
    protected $dates = ['deleted_at'];
}
