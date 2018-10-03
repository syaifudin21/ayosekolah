<?php

namespace App\Http\Controllers\layanan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Album;
use App\Models\Foto;
use App\Models\Pengurus;
use File;

class AlbumController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:pengurus')->only('pengurus', 'pengurus_albumid', 'pengurus_edit', 'delete');
        $this->middleware('auth:sekolah')->only('sekolah');
    }
    public function pengurus()
    {
    	$template = 'pengurus.template-pengurus';
    	$auth = 'pengurus';
    	$id_auth = auth::user('auth:pengurus')->id;
    	$albums = Album::all();
    	return view('layanan.album', compact('template', 'albums', 'auth', 'id_auth'));
    }
    public function sekolah()
    {
        dd(auth::user('auth:sekolah'));
    }
    public function store(Request $request)
    {
        $album = new Album();
        $album->fill($request->all());
        $album['slug_album'] = str_slug($request->nama, '-');
        $album->save();
        return  back()->with('success', 'Berhasil Menambahkan Album');
    }
    public function update(Request $request)
    {
        $album = Album::find($request->id);
        $album->fill($request->all());
        $album['slug_album'] = str_slug($request->nama, '-');
        $album->update();
        return back()->with('success', 'Berhasil Mengubah Keterangan Album');
    }
    public function pengurus_albumid($id)
    {
        $template = 'pengurus.template-pengurus';
        $auth = 'pengurus';
        $id_auth = auth::user('auth:pengurus')->id;
        $album = Album::find($id);
        $fotos = Foto::where('id_album', $id)->orderBy('updated_at', 'desc')->get();
        if (!empty($album)) {
            return view('layanan.albumid', compact('template', 'album', 'auth', 'id_auth', 'id', 'fotos'));
        } else {
            return redirect($auth.'/album');
        }
        
    }
    public function pengurus_edit($id)
    {
        $template = 'pengurus.template-pengurus';
        $auth = 'pengurus';
        $id_auth = auth::user('auth:pengurus')->id;
        $album = Album::find($id);
        return view('layanan.album-update', compact('template', 'album', 'auth', 'id_auth', 'id'));
    }
    public function delete($id)
    {
        $fotos = Foto::where('id_album',$id)->get();
        foreach ($fotos as $foto) {
            Storage::disk('ftp-album')->delete($foto->foto);
            Foto::find($foto->id)->delete();
        }
        $album = Album::find($id)->delete();
        return back()->with('success',' Album Berhasil Dihapus');
    }
}
