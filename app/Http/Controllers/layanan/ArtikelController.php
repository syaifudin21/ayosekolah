<?php

namespace App\Http\Controllers\layanan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Artikel;
use File;
use Illuminate\Support\Facades\Auth;

class ArtikelController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:pengurus')->only('pengurus', 'pengurus_artikelid', 'pengurus_edit', 'delete');
        $this->middleware('auth:sekolah')->only('sekolah');
    }
    public function pengurus()
    {
    	$template = 'pengurus.template-pengurus';
    	$auth = 'pengurus';
    	$id_auth = auth::user('auth:pengurus')->id;
    	$artikels = Artikel::all();
    	return view('layanan.artikel', compact('template', 'artikels', 'auth', 'id_auth'));
    }
    public function sekolah()
    {
        dd(auth::user('auth:sekolah'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            "text_pembuka" => 'required|max:255',
        ]);
        $artikel = new Artikel();
        $artikel->fill($request->all());
        if ($request->hasFile('lampiran')){
            $filenamewithextension = $request->file('lampiran')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('lampiran')->getClientOriginalExtension();
            $filenametostorefoto = $filename.'_'.uniqid().'.'.$extension;
            Storage::disk('ftp-artikel')->put($filenametostorefoto, fopen($request->file('lampiran'), 'r+'));
            $artikel['lampiran'] = $filenametostorefoto;
        }
        $artikel['slug_judul'] = str_slug($request->judul, '-');
        $artikel->save();
        return  back()->with('success', 'Berhasil Menambahkan Artikel');
    }
    public function update(Request $request)
    {
        $artikel = Artikel::find($request->id);
        $artikelh = Artikel::find($request->id);
        $artikel->fill($request->all());
        if ($request->hasFile('lampiran')){
            $filenamewithextension = $request->file('lampiran')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('lampiran')->getClientOriginalExtension();
            $filenametostorefoto = $filename.'_'.uniqid().'.'.$extension;
            Storage::disk('ftp-artikel')->put($filenametostorefoto, fopen($request->file('lampiran'), 'r+'));
            Storage::disk('ftp-artikel')->delete($artikelh->lampiran);
            $artikel['lampiran'] = $filenametostorefoto;
        }
        $artikel['slug_judul'] = str_slug($request->judul, '-');
        $artikel->update();
        return back()->with('success', 'Berhasil Mengubah Keterangan Artikel');
    }
    public function pengurus_artikelid($id)
    {
        $template = 'pengurus.template-pengurus';
        $auth = 'pengurus';
        $id_auth = auth::user('auth:pengurus')->id;
        $artikel = Artikel::find($id);
        if (!empty($artikel)) {
            return view('layanan.artikel-id', compact('template', 'artikel', 'auth', 'id_auth', 'id'));
        } else {
            return redirect($auth.'/artikel');
        }
        
    }
    public function pengurus_edit($id)
    {
        $template = 'pengurus.template-pengurus';
        $auth = 'pengurus';
        $id_auth = auth::user('auth:pengurus')->id;
        $artikel = Artikel::find($id);
        return view('layanan.artikel-update', compact('template', 'artikel', 'auth', 'id_auth', 'id'));
    }
    public function delete($id)
    {
        $artikel = Artikel::find($id);
        Storage::disk('ftp-artikel')->delete($artikel->lampiran);
        $artikel->delete();
        return back()->with('success',' Artikel Berhasil Dihapus');
    }
}
