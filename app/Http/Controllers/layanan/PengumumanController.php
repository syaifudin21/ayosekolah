<?php

namespace App\Http\Controllers\layanan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use File;

class PengumumanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:pengurus')->only('pengurus_siswabaru', 'pengurus_id', 'pengurus_update', 'pengurus_pengurus', 'pengurus_pengurus_id', 'pengurus_pengurus_update');
        $this->middleware('auth:sekolah')->only('sekolah');
    }
    public function pengurus_siswabaru()
    {
    	$template = 'pengurus.template-pengurus';
    	$auth = 'Pengurus';
        $objek = 'Siswa Baru';
        $menu = 'siswabaru';
    	$id_auth = auth::user('auth:pengurus')->id;
    	$pengumumans = Pengumuman::where('objek', 'Siswa Baru')->get();
    	return view('layanan.pengumuman', compact('template', 'pengumumans', 'auth', 'id_auth', 'objek', 'menu'));
    }
    public function pengurus_id($id)
    {
        $template = 'pengurus.template-pengurus';
        $auth = 'Pengurus';
        $objek = 'Siswa Baru';
        $menu = 'siswabaru';
        $id_auth = auth::user('auth:pengurus')->id;
        $pengumuman = Pengumuman::find($id);
        return view('layanan.pengumuman-id', compact('template', 'pengumuman', 'auth', 'id_auth', 'objek', 'menu'));
    }
    public function pengurus_update($id)
    {
        $template = 'pengurus.template-pengurus';
        $auth = 'Pengurus';
        $objek = 'Siswa Baru';
        $menu = 'siswabaru';
        $id_auth = auth::user('auth:pengurus')->id;
        $pengumuman = Pengumuman::find($id);
        return view('layanan.pengumuman-update', compact('template', 'pengumuman', 'auth', 'id_auth', 'objek', 'menu'));
    }

    //pengurus
    public function pengurus_pengurus()
    {
        $template = 'pengurus.template-pengurus';
        $auth = 'Pengurus';
        $objek = 'Umum';
        $menu = 'pengurus';
        $id_auth = auth::user('auth:pengurus')->id;
        $pengumumans = Pengumuman::where('objek', 'Umum')->get();
        return view('layanan.pengumuman', compact('template', 'pengumumans', 'auth', 'id_auth', 'objek', 'menu'));
    }
    public function pengurus_pengurus_id($id)
    {
        $template = 'pengurus.template-pengurus';
        $auth = 'Pengurus';
        $objek = 'Umum';
        $menu = 'pengurus';
        $id_auth = auth::user('auth:pengurus')->id;
        $pengumuman = Pengumuman::find($id);
        return view('layanan.pengumuman-id', compact('template', 'pengumuman', 'auth', 'id_auth', 'objek', 'menu'));
    }
    public function pengurus_pengurus_update($id)
    {
        $template = 'pengurus.template-pengurus';
        $auth = 'Pengurus';
        $objek = 'Umum';
        $menu = 'pengurus';
        $id_auth = auth::user('auth:pengurus')->id;
        $pengumuman = Pengumuman::find($id);
        return view('layanan.pengumuman-update', compact('template', 'pengumuman', 'auth', 'id_auth', 'objek', 'menu'));
    }

    //sistem crud
    public function store(Request $request)
    {
        $pengumuman = new Pengumuman();
        $pengumuman->fill($request->all());
        if ($request->hasFile('lampiran')){
            $filenamewithextension = $request->file('lampiran')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('lampiran')->getClientOriginalExtension();
            $filenametostorefoto = $filename.'_'.uniqid().'.'.$extension;
            Storage::disk('ftp-pengumuman')->put($filenametostorefoto, fopen($request->file('lampiran'), 'r+'));
            $pengumuman['lampiran'] = $filenametostorefoto;
        }
        $pengumuman['slug_pengumuman'] = str_slug($request->nama_pengumuman, '-');
        $pengumuman->save();
        return  back()->with('success', 'Berhasil Menambahkan Pengumuman');
    }
    public function update(Request $request)
    {
        $pengumuman = Pengumuman::find($request->id);
        $pengumumanh = Pengumuman::find($request->id);
        $pengumuman->fill($request->all());
        if ($request->hasFile('lampiran')){
            $filenamewithextension = $request->file('lampiran')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('lampiran')->getClientOriginalExtension();
            $filenametostorefoto = $filename.'_'.uniqid().'.'.$extension;
            Storage::disk('ftp-pengumuman')->put($filenametostorefoto, fopen($request->file('lampiran'), 'r+'));
            Storage::disk('ftp-pengumuman')->delete($pengumumanh->lampiran);
            $pengumuman['lampiran'] = $filenametostorefoto;
        }
        $pengumuman['slug_pengumuman'] = str_slug($request->nama_pengumuman, '-');
        $pengumuman->update();
        return back()->with('success', 'Berhasil Mengubah Keterangan Pengumuman');
    }
    public function delete($id)
    {
        $pengumuman = Pengumuman::find($id);
        Storage::disk('ftp-pengumuman')->delete($pengumuman->lampiran);
        $pengumuman->delete();
        return back()->with('success',' Pengumuman Berhasil Dihapus');
    }
}
