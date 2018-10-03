<?php

namespace App\Http\Controllers\layanan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use File;

class AgendaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:pengurus')->only('pengurus', 'pengurus_id', 'pengurus_update');
        $this->middleware('auth:sekolah')->only('sekolah');
    }
    public function pengurus()
    {
    	$template = 'pengurus.template-pengurus';
    	$auth = 'Pengurus';
        $menu = 'pengurus';
    	$id_auth = auth::user('auth:pengurus')->id;
    	$agendas = Agenda::all();
    	return view('layanan.agenda', compact('template', 'agendas', 'auth', 'id_auth', 'menu'));
    }
    public function pengurus_update($id)
    {
        $template = 'pengurus.template-pengurus';
        $auth = 'Pengurus';
        $menu = 'pengurus';
        $id_auth = auth::user('auth:pengurus')->id;
        $agenda = Agenda::find($id);
        return view('layanan.agenda-update', compact('template', 'agenda', 'auth', 'id_auth', 'menu'));
    }
    public function store(Request $request)
    {
        $agenda = new Agenda();
        $agenda->fill($request->all());
        $agenda->save();
        return  back()->with('success', 'Berhasil Menambahkan Pengumuman');
    }
    public function update(Request $request)
    {
        $agenda = Agenda::find($request->id);
        $agenda->fill($request->all());
        $agenda->update();
        return back()->with('success', 'Berhasil Mengubah Keterangan Pengumuman');
    }
    public function delete($id)
    {
        $agenda = Agenda::find($id)->delete();
        return back()->with('success',' Pengumuman Berhasil Dihapus');
    }
}
