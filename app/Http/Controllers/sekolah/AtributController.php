<?php

namespace App\Http\Controllers\sekolah;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Atribut;

class AtributController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:sekolah');
    }

    public function index()
    {
    	$atributs = Atribut::all();
    	return view('sekolah.atribut', compact('atributs'));
    }
    public function store(Request $request)
    {
        $atribut = new Atribut();
        $atribut->fill($request->all());
        $atribut->save();
        return  back()->with('success', 'Berhasil Menambahkan Atribut');
    }
    public function atributid($id)
    {
        $atribut = Atribut::find($id);
        return view('sekolah.atribut-id', compact('atribut', 'id'));
    }
    public function edit($id)
    {
        $atribut = Atribut::find($id);
        return view('sekolah.atribut-update', compact('atribut', 'id'));
    }
    public function update(Request $request)
    {
        $atribut = Atribut::find($request->id);
        $atribut->fill($request->all());
        $atribut->update();
        return redirect('sekolah/atribut');
    }
    public function delete($id)
    {
    	Atribut::where('id', $id)->delete();
        return back()->with('success',' Mata Pelajaran Berhasil Dihapus');
    }
}
