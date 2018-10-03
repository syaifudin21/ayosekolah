<?php

namespace App\Http\Controllers\pengurus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengurus;
use App\Models\Profil_siswa;
use App\Models\Masukkan;

class PengurusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:pengurus');
    }

    public function index()
    {
        return view('pengurus.dasboard');
    }
    public function profil()
    {
    	$pengurus = Pengurus::findOrFail(Auth::user()->id);
        return view('pengurus.profil', compact('pengurus'));
    }
    public function update(Request $request)
    {
        $pengurus = Pengurus::findOrFail(Auth::user()->id);
        $pengurus->fill($request->all());
        if (Hash::check($request->passwordlama, $pengurus->password)){
            if (!empty($request->passwordbaru)) {
                if ($request->passwordbaru == $request->cpasswordbaru){
                    $passwordbaru = Hash::make($request->passwordbaru);
                    $pengurus['password'] = $passwordbaru;
                }
            }
            $pengurus->update();
            return back()->with('success','Password berhasil diupdate');
        }else{
            return back()->with('gagal', 'Gagal Mengupdate Profil, passtikan password anda yang anda masukkan benar');
        }
        $pengurus->update();
        return back()->with('success','Password berhasil diupdate');

    }
    public function baru()
    {
        $siswas = Profil_siswa::where('status', 'Daftar')->get();
        return view('pengurus.siswabaru', compact('siswas'));
    }
    public function siswaprofil($id)
    {
        $siswa = Profil_siswa::find($id);
        return view('pengurus.siswabaru-id', compact('siswa'));
    }
    public function siswaupdate(Request $data)
    {
       Validator::make($data->all(), [
            'foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'ijazah' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ])->validate();

        $profil = Profil_siswa::findOrFail($data->id);
        $profill = Profil_siswa::findOrFail($data->id);
        $profil->fill($data->all());

        if ($data->hasFile('foto')){
            $filenamewithextension = $data->file('foto')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $data->file('foto')->getClientOriginalExtension();
            $filenametostorefoto = $filename.'_'.uniqid().'.'.$extension;
            File::delete('images/siswa/'.$profill->foto);
            $data->file('foto')->move('images/siswa',$filenametostorefoto);
            $profil['foto'] = $filenametostorefoto;
        }
        if ($data->hasFile('ijazah')){
            $filenamewithextension = $data->file('ijazah')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $data->file('ijazah')->getClientOriginalExtension();
            $filenametostoreijazah = $filename.'_'.uniqid().'.'.$extension;
            File::delete('images/siswa/'.$profill->ijazah);
            $data->file('ijazah')->move('images/siswa',$filenametostoreijazah);
            $profil['ijazah'] = $filenametostoreijazah;
        }

        $profil->update();

        return back()->with('success', 'Berhasil Mengajukan Data');
    }
    public function masukan()
    {
        $masukans = Masukkan::orderBy('created_at', 'desc')->get();
        return view('pengurus.masukan', compact('masukans'));
    }
    public function masukanhapus($id)
    {
        Masukkan::find($id)->delete();
        return back()->with('success',' Saran / Masukkan Berhasil Dihapus');
    }
}
