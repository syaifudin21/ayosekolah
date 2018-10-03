<?php

namespace App\Http\Controllers\sekolah;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Models\VerificationMember;
use App\Mail\VerificationMailMember;
use App\Models\Sekolah;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Profil_sekolah;
use Illuminate\Support\Facades\Storage;

class SekolahDaftarController extends Controller
{
    protected $redirectTo = '/sekolah';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function daftar()
    {
        $sekolah = Sekolah::find(1);
        if (!empty($sekolah)) {
            return redirect('/sekolah');
        }
        return view('sekolah.sekolah_daftar');
    }

    public function create(Request $data)
    {
        Validator::make($data->all(), [
            'email' => 'required|string|email|max:255|unique:sekolahs',
            'password' => 'required|string|min:6|confirmed',
            'nama_sekolah'=> 'required',
            'npsn' => 'required', 
            'nama_singkat_sekolah' => 'required',
            'jenjang' => 'required',
            'email_sekolah' => 'required',
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
        ])->validate();

        $user = Sekolah::create([
            'nama' => $data['nama_sekolah'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $profil = new Profil_sekolah();
        $profil->fill($data->all());
        $profil['id_sekolah'] = $user->id;

        if ($data->hasFile('logo')){
            $filenamewithextension = $data->file('logo')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $data->file('logo')->getClientOriginalExtension();
            $filenametostorelogo = $filename.'_'.uniqid().'.'.$extension;
            Storage::disk('ftp-setting')->put($filenametostorelogo, fopen($data->file('logo'), 'r+'));
            $profil['logo'] = $filenametostorelogo;
        }
        if ($data->hasFile('sk')){
            $filenamewithextension = $data->file('sk')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $data->file('sk')->getClientOriginalExtension();
            $filenametostoresk = $filename.'_'.uniqid().'.'.$extension;
            Storage::disk('ftp-setting')->put($filenametostoresk, fopen($data->file('sk'), 'r+'));
            $profil['sk'] = $filenametostoresk;
        }
        $profil['email']= $data['email_sekolah'];

        $profil->save();

        if (!$profil) {
            Sekolah::find($user->id)->delete();
        }

        $credential = [
            'email' => $data->email,
            'password' => $data->password
        ];

        if (Auth::guard('sekolah')->attempt($credential, $data)){
            return redirect()->intended(route('sekolah'));
        }
        return redirect('/sekolah');
    }

    protected function registered(Request $request, $user){
        return redirect('/sekolah');
    }
}

