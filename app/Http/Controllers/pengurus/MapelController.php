<?php

namespace App\Http\Controllers\pengurus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mapel;

class MapelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:pengurus');
    }
    public function mapel()
    {
    	$mapel = Mapel::all();
    	return view('pengurus.mapel', compact('mapel'));
    }
    public function tambah(Request $req)
    {
    	$this->validate($req, [
    		'mapel' => 'required',
    	]);

    	Mapel::create([
    		'mapel' => $req->mapel,
    		'deskripsi' => $req->deskripsi,
            'jenis_mapel' => $req->jenis_mapel,
    	]);

    	return back()->with('success','Mata Pelajaran '. $req->mapel. ' Berhasil Ditambahkan');
    }
    public function lihat($id)
    {
        $mapelid = Mapel::find($id); 
        return view('pengurus.mapel_detail', compact('mapelid', 'id'));
    }
    public function edit($id)
    {
        $mapelid = Mapel::find($id); 
        return view('pengurus.mapel_update', compact('mapelid', 'id'));
    }
    public function update(Request $req)
    {
        Mapel::where('id', $req->id_mapel)
        ->update([
            'mapel' => $req->mapel,
            'deskripsi' => $req->deskripsi,
            'jenis_mapel' => $req->jenis_mapel,
        ]);
        return redirect('pengurus/mapel/lihat/'. $req->id_mapel)->with('success','Kelas '. $req->mapel. ' Berhasil diupdate');
    }
    public function delete($id)
    {
        Mapel::where('id', $id)->delete();
        return back()->with('success',' Mata Pelajaran Berhasil Dihapus');
    }
}
