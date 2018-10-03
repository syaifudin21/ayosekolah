<?php

namespace App\Http\Controllers\siswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Profil_siswa;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:siswa');
    }

    public function index()
    {
    	$siswa = Profil_siswa::where('nim',Auth::user('siswa')->nisn)->first();
    	if ($siswa->status == 'Daftar') {
    		return redirect('siswa/baru');
    	}
        return view('siswa.dasbord', compact('siswa'));
    }
    public function baru()
    {
    	$siswa = Profil_siswa::where('nim',Auth::user('siswa')->nisn)->first();
    	$pengumumans = Pengumuman::where('objek', 'Siswa Baru')->get();
        return view('siswa.baru', compact('siswa', 'pengumumans'));
    }
}
