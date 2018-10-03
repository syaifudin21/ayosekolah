<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil_pengajar extends Model
{
    protected $fillable = [
       'nama_lengkap','pengajar_id','tgl', 'jk', 'nim', 'agama', 'alamat', 'transportasi', 'nomor_hp', 'nama_ayah','nama_ibu', 'alamat_ortu', 'keterangan_ayah', 'keterangan_ibu', 'foto', 'ijazah', 'lulusan'
    ];
    public function pengajar(){
    	return $this->belongsTo('App\Models\Pengajar', 'pengajar_id');
    }
}
