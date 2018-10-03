<?php

namespace App\Http\Controllers\sekolah;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use File;
use App\Models\Profil_sekolah;
use App\Models\Pengurus;
use App\Models\Tahun_ajaran;
use Illuminate\Support\Facades\Storage;

class SekolahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sekolah');
    }

    public function index()
    {
        return view('sekolah.dasboard');
    }
    public function profil()
    {
        $sekolah = Profil_sekolah::findOrFail(1);
        return view('sekolah.profil', compact('sekolah'));
    }
    public function edit(Request $request)
    {
        $this->validate($request, [
            'nama_sekolah'=> 'required',
            'npsn' => 'required', 
            'jenjang' => 'required',
            'status' => 'required', 
            'alamat' => 'required', 
            'kode_pos' => 'required', 
            'maps' => 'required', 
            'sk' => 'required', 
            'sk_izin' => 'required', 
            'tgl_sk' => 'required', 
            'status_kepemilikan' => 'required', 
            'luastanah_milik' => 'required', 
            'luastanah_bukan' => 'required', 
            'nama_wajib_pajak' => 'required', 
            'npwp', 'no_telp' => 'required', 
            'no_fax' => 'required', 
            'email' => 'required', 
            'website' => 'required', 
            'waktu_sekolah' => 'required', 
            'menerima_bos' => 'required', 
            'sertifikasi_iso' => 'required', 
            'sumber_listrik' => 'required', 
            'daya_listrik' => 'required', 
            'akses_internet' => 'required', 
            'kepala_sekolah' => 'required', 
            'akriditasi' => 'required', 
            'kurikulum' => 'required', 
            'logo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'sk' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $sekolah = Profil_sekolah::findOrFail(1);
        $sekolahh = Profil_sekolah::findOrFail(1);
        $sekolah->fill($request->all());

        if ($request->hasFile('logo')){
            $filenamewithextension = $request->file('logo')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('logo')->getClientOriginalExtension();
            $filenametostorelogo = $filename.'_'.uniqid().'.'.$extension;
            Storage::disk('ftp-setting')->put($filenametostorelogo, fopen($request->file('logo'), 'r+'));
            Storage::disk('ftp-setting')->delete($sekolahh->logo);
            $request->file('logo')->move('images/setting',$filenametostorelogo);
            $sekolah['logo'] = $filenametostorelogo;
        }
        if ($request->hasFile('sk')){
            $filenamewithextension = $request->file('sk')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('sk')->getClientOriginalExtension();
            $filenametostoresk = $filename.'_'.uniqid().'.'.$extension;
            Storage::disk('ftp-setting')->put($filenametostoresk, fopen($request->file('sk'), 'r+'));
            Storage::disk('ftp-setting')->delete($sekolahh->sk);
            $request->file('sk')->move('images/setting',$filenametostoresk);
            $sekolah['sk'] = $filenametostoresk;
        }

        $sekolah->update();
        
        return back()->with('success', 'Berhasil Mengubah Data');
    }
    public function pengurus()
    {
        $penguruses = Pengurus::all();
        return view('sekolah.pengurus', compact('penguruses'));
    }
    public function pengurusid($id)
    {
        $pengurus = Pengurus::find($id);
        return view('sekolah.pengurus-id', compact('pengurus', 'id'));
    }
    public function pengurusedit($id)
    {
        $pengurus = Pengurus::find($id);
        return view('sekolah.pengurus-update', compact('pengurus', 'id'));
    }
    public function pengurusupdate(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $pengurus = Pengurus::find($request->id);
        $pengurus->fill($request->all());
        $pengurus['status'] = (!empty($request->status))?implode(',', $request['status']):'';
        $pengurus->update();
        return redirect('sekolah/pengurus')->with('success', 'Berhasil Mengubah Data Pengurus');
    }
    public function storepengurus(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:penguruses',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $user = Pengurus::create([
            'nama' => $request['nama'],
            'email' => $request['email'],
            'status' => (!empty($request->status))?implode(',', $request['status']):'',
            'password' => Hash::make($request['password']),
        ]);
        return  back()->with('success', 'Berhasil Menambahkan Pengurus');
    }
    public function deletepengurus($id)
    {
        Pengurus::findOrFail($id)->delete();
        return  back()->with('success', 'Berhasil Menghapus Pengurus');
    }
    
}
