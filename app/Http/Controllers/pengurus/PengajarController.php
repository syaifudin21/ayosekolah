<?php

namespace App\Http\Controllers\pengurus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use File;
use App\Models\Profil_pengajar;
use App\Models\Pengajar;

class PengajarController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:pengurus');
    }

    public function index()
    {
        $pengajars = Pengajar::join('profil_pengajars', 'pengajars.id', '=', 'profil_pengajars.id_pengajar')
                    ->select('pengajars.*','profil_pengajars.id as idp')
                    ->get();
    	$pendings = Profil_pengajar::whereNull('id_pengajar')->get();
    	return view('pengurus.pengajar', compact('pengajars', 'pendings'));
    }
    public function profil($id)
    {
    	$pengajar = Profil_pengajar::findOrFail($id);
    	return view('pengurus.pengajarid', compact('pengajar'));
    }
    public function update(Request $data)
    {
    	Validator::make($data->all(), [
            'foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'ijazah' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ])->validate();

        $profil = Profil_pengajar::findOrFail($data->id);
        $profill = Profil_pengajar::findOrFail($data->id);
        $profil->fill($data->all());

        if ($data->hasFile('foto')){
            $filenamewithextension = $data->file('foto')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $data->file('foto')->getClientOriginalExtension();
            $filenametostorefoto = $filename.'_'.uniqid().'.'.$extension;
            File::delete('images/pengajar/'.$profill->foto);
            $data->file('foto')->move('images/pengajar',$filenametostorefoto);
            $profil['foto'] = $filenametostorefoto;
        }
        if ($data->hasFile('ijazah')){
            $filenamewithextension = $data->file('ijazah')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $data->file('ijazah')->getClientOriginalExtension();
            $filenametostoreijazah = $filename.'_'.uniqid().'.'.$extension;
            File::delete('images/pengajar/'.$profill->ijazah);
            $data->file('ijazah')->move('images/pengajar',$filenametostoreijazah);
            $profil['ijazah'] = $filenametostoreijazah;
        }

        $profil->update();

        return back()->with('success', 'Berhasil Mengajukan Data');
    }
    public function datapengajar()
    {
        $guru = Pengajar::all();
        return $guru;
    }
    public function terima(Request $data)
    {
        Validator::make($data->all(), [
            'foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'ijazah' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ])->validate();

        $pengajar = Pengajar::create([
            'nama' => $data['nama_lengkap'],
            'username' => $data['nomor_hp'],
            'password' => Hash::make($data['nomor_hp']),
        ]);

        $profil = Profil_pengajar::findOrFail($data->id);
        $profill = Profil_pengajar::findOrFail($data->id);
        $profil->fill($data->all());

        if ($data->hasFile('foto')){
            $filenamewithextension = $data->file('foto')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $data->file('foto')->getClientOriginalExtension();
            $filenametostorefoto = $filename.'_'.uniqid().'.'.$extension;
            File::delete('images/pengajar/'.$profill->foto);
            $data->file('foto')->move('images/pengajar',$filenametostorefoto);
            $profil['foto'] = $filenametostorefoto;
        }
        if ($data->hasFile('ijazah')){
            $filenamewithextension = $data->file('ijazah')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $data->file('ijazah')->getClientOriginalExtension();
            $filenametostoreijazah = $filename.'_'.uniqid().'.'.$extension;
            File::delete('images/pengajar/'.$profill->ijazah);
            $data->file('ijazah')->move('images/pengajar',$filenametostoreijazah);
            $profil['ijazah'] = $filenametostoreijazah;
        }

        $profil['id_pengajar'] = $pengajar->id;
        $profil->update();

        return back()->with('success', 'Berhasil Mengajukan Data');
    }
}
