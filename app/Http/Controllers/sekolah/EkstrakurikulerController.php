<?php

namespace App\Http\Controllers\sekolah;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Ekstrakurikuler;
use App\Models\Pengajar;
use File;

class EkstrakurikulerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sekolah');
    }

    public function index()
    {
        $ekstrakurikulers = Ekstrakurikuler::get();
        $pengajars = Pengajar::all();
        return view('sekolah.ekstrakurikuler', compact('ekstrakurikulers', 'pengajars'));
    }
    public function store(Request $request)
    {
        $ekstrakurikuler = new Ekstrakurikuler();
        $ekstrakurikuler->fill($request->all());
        if ($request->hasFile('foto')){
            $filenamewithextension = $request->file('foto')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('foto')->getClientOriginalExtension();
            $filenametostorefoto = $filename.'_'.uniqid().'.'.$extension;
            $request->file('foto')->move('images/ekstrakurikuler',$filenametostorefoto);
            $ekstrakurikuler['foto'] = $filenametostorefoto;
        }
        $ekstrakurikuler->save();
        return  back()->with('success', 'Berhasil Menambahkan Atribut');
    }
    public function atributid($id)
    {
        $ekstrakurikuler = Ekstrakurikuler::find($id);
        return view('sekolah.ekstrakurikuler-id', compact('ekstrakurikuler', 'id'));
    }
    public function edit($id)
    {
        $ekstrakurikuler = Ekstrakurikuler::find($id);
        $pengajars = Pengajar::all();
        return view('sekolah.ekstrakurikuler-update', compact('ekstrakurikuler', 'id', 'pengajars'));
    }
    public function update(Request $request)
    {
        $ekstrakurikuler = Ekstrakurikuler::find($request->id);
        $ekstrakurikuler->fill($request->all());
        if ($request->hasFile('foto')){
            $filenamewithextension = $request->file('foto')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('foto')->getClientOriginalExtension();
            $filenametostorefoto = $filename.'_'.uniqid().'.'.$extension;
            File::delete('images/ekstrakurikuler/'.$ekstrakurikuler->foto);
            $request->file('foto')->move('images/ekstrakurikuler',$filenametostorefoto);
            $ekstrakurikuler['foto'] = $filenametostorefoto;
        }
        $ekstrakurikuler->update();
        return redirect('sekolah/ekstrakurikuler');
    }
    public function delete($id)
    {
        $ekstrakurikuler = Ekstrakurikuler::find($id);
        File::delete('images/ekstrakurikuler/'.$ekstrakurikuler->foto);
        $ekstrakurikuler->delete();
        return back()->with('success',' Mata Pelajaran Berhasil Dihapus');
    }
}
