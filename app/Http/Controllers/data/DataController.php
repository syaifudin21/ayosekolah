<?php

namespace App\Http\Controllers\data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Tingkat_kelas;

class DataController extends Controller
{
    public function tampiljurusan($id)
    {
    	$jurusans = Jurusan::where('id_kurikulum', $id)->select('id','jurusan')->get();
    	$data = [
    		'jurusans' => $jurusans
    	];
    	return $data;
    }
    public function tampiltingkatkelas($id)
    {
    	$tks = Tingkat_kelas::where('id_jurusan', $id)->get();
    	$data = [
    		'tks' => $tks
    	];
    	return $data;
    }
}
