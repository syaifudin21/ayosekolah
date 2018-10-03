<?php

namespace App\Http\Controllers\sekolah;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use File;
use App\Models\Fasilitas;

class FasilitasController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:sekolah');
    }

    public function index()
    {
        $fasilitases = Fasilitas::all();
        return view('sekolah.fasilitas', compact('fasilitases'));
    }
    public function store(Request $request)
    {
        $fasilitas = new Fasilitas();
        $fasilitas->fill($request->all());
        if ($request->hasFile('foto')){
            $filenamewithextension = $request->file('foto')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('foto')->getClientOriginalExtension();
            $filenametostorefoto = $filename.'_'.uniqid().'.'.$extension;
            $request->file('foto')->move('images/fasilitas',$filenametostorefoto);
            $fasilitas['foto'] = $filenametostorefoto;
        }
        $fasilitas->save();
        return  back()->with('success', 'Berhasil Menambahkan Atribut');
    }
    public function atributid($id)
    {
        $fasilitas = Fasilitas::find($id);
        return view('sekolah.fasilitas-id', compact('fasilitas', 'id'));
    }
    public function edit($id)
    {
        $fasilitas = Fasilitas::find($id);
        return view('sekolah.fasilitas-update', compact('fasilitas', 'id'));
    }
    public function update(Request $request)
    {
        $fasilitas = Fasilitas::find($request->id);
        $fasilitas->fill($request->all());
        if ($request->hasFile('foto')){
            $filenamewithextension = $request->file('foto')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('foto')->getClientOriginalExtension();
            $filenametostorefoto = $filename.'_'.uniqid().'.'.$extension;
            File::delete('images/fasilitas/'.$fasilitas->foto);
            $request->file('foto')->move('images/fasilitas',$filenametostorefoto);
            $fasilitas['foto'] = $filenametostorefoto;
        }
        $fasilitas->update();
        return redirect('sekolah/fasilitas');
    }
    public function delete($id)
    {
        $fasilitas = Fasilitas::find($id);
        File::delete('images/fasilitas/'.$fasilitas->foto);
        $fasilitas->delete();
        return back()->with('success',' Mata Pelajaran Berhasil Dihapus');
    }
}
