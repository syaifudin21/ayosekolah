<?php

namespace App\Http\Controllers\siswa;

use Mail;
use App\Models\VerificationMember;
use App\Mail\VerificationMailMember;
use App\Models\Siswa;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tahun_ajaran;
use App\Models\Profil_siswa;


class SiswaDaftarController extends Controller
{
    protected $redirectTo = '/siswa';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function daftar()
    {
        return view('siswa.siswa_daftar');
    }

    public function create(Request $data)
    {
        Validator::make($data->all(), [
            'nisn' => 'required|string|max:255|unique:siswas',
        ])->validate();

        Siswa::create([
            'nisn' => $data['nisn'],
            'password' => Hash::make($data['nisn']),
        ]);

        $credential = [
            'nisn' => $data->nisn,
            'password' => $data->nisn
        ];

        if (Auth::guard('siswa')->attempt($credential, false)){
            return redirect()->intended(route('siswa'));
        }
        return redirect('/siswa');
    }
    public function tambah(Request $req)
    {
        $this->validate($req, [
            "nama_lengkap" => 'required',
            "tgl" =>  'required',
            'nim' => 'required|string|max:255|unique:profil_siswas',
            "jk" =>  'required',
            "agama" =>  'required',
            "tinggi" =>  'required',
            "berat" =>  'required',
            "nomor_hp" =>  'required',
            "jln" =>  'required',
            "rt" =>  'required',
            "rw" =>  'required',
            "Dusun" =>  'required',
            "Desa" =>  'required',
            "Kecamatan" =>  'required',
            "Kabupaten" => 'required',
            "tinggal" =>  'required',
            "transportasi" =>  'required',
            "tempu_sekolah" =>  'required',
            "jarak_sekolah" =>  'required',
            "nama_ayah" => 'required',
            "tgl_ayah" => 'required',
            "pekerjaan_ayah" => 'required',
            "pendidikan_ayah" => 'required',
            "keterangan_ayah" => 'required',
            "nama_ibu" => 'required',
            "tgl_ibu" => 'required',
            "pekerjaan_ibu" => 'required',
            "pendidikan_ibu" => 'required',
            "keterangan_ibu" => 'required',
            "nomor_hp_ortu" => 'required',
            "ortu_jln" =>  'required',
            "ortu_rt" => 'required',
            "ortu_rw" => 'required',
            "ortu_dusun" => 'required',
            "ortu_desa" => 'required',
            "ortu_kecamatan" => 'required',
            "ortu_kabupaten" => 'required',
            "sekolah_asal" => 'required',
            "sekolah_alamat" => 'required',
            "sekolah_angkatan" => 'required',
        ]);
        // date("Y-m-d", strtotime(Carbon::now()));
        $ta = Tahun_ajaran::where('status', 'Aktif')->first();
        // dd($ta);

        $foto    = time().$req->file('foto')->getClientOriginalName();
        $ijazah  = time().$req->file('ijazah')->getClientOriginalName();

        Profil_siswa::create([
            'ta' => $ta->tahun_ajaran ,  
            'nama_lengkap' => $req->nama_lengkap ,  
            'tgl' => $req->tgl ,  
            'jk' => $req->jk ,  
            'nim' => $req->nim ,  
            'agama' => $req->agama ,
            'alamat' => 'RT/RW ('.$req->rt.'/'. $req->rw. ') jln. '. $req->jln .' Dsn. '. $req->Dusun.' Ds. '. $req->Desa.' Kec. '. $req->Kecamatan.' Kab. '. $req->Kabupaten , 
            'tinggal' => $req->tinggal ,  
            'transportasi' => $req->transportasi ,  
            'nomor_hp' => $req->nomor_hp ,  
            'nama_ayah' => $req->nama_ayah ,  
            'nama_ibu' => $req->nama_ibu ,  
            'tgl_ayah' => $req->tgl_ayah ,  
            'tgl_ibu' => $req->tgl_ibu ,  
            'nomor_hp_ortu' => $req->nomor_hp_ortu ,  
            'pendidikan_ayah' => $req->pendidikan_ayah ,  
            'pendidikan_ibu' => $req->pendidikan_ibu ,  
            'pekerjaan_ayah' => $req->pekerjaan_ayah ,  
            'pekerjaan_ibu' => $req->pekerjaan_ibu ,  
            'alamat_ortu' => 'RT/RW ('.$req->ortu_rt.'/'. $req->ortu_rw. ') jln. '. $req->ortu_jln .' Dsn. '. $req->ortu_dusun.' Ds. '. $req->ortu_desa.' Kec. '. $req->ortu_kecamatan.' Kab. '. $req->ortu_kabupaten  ,  
            'keterangan_ayah' => $req->keterangan_ayah ,  
            'keterangan_ibu' => $req->keterangan_ibu ,  
            'tinggi' => $req->tinggi ,  
            'berat' => $req->berat ,  
            'jarak_sekolah' => $req->jarak_sekolah ,  
            'tempu_sekolah' => $req->tempu_sekolah ,  
            'sekolah_asal' => $req->sekolah_asal ,  
            'sekolah_alamat' => $req->sekolah_alamat ,  
            'sekolah_angkatan' => $req->sekolah_angkatan ,  
            'foto' => $foto ,  
            'ijazah' => $ijazah,
        ]);
        $req->file('foto')->move('images/siswa/', $foto);
        $req->file('ijazah')->move('images/siswa/', $ijazah);

        Siswa::create([
            'nisn' => $req['nim'],
            'password' => Hash::make($req['nim']),
        ]);

        $credential = [
            'nisn' => $req->nim,
            'password' => $req->nim
        ];

        if (Auth::guard('siswa')->attempt($credential, false)){
            return redirect()->intended(route('siswa'));
        }
        return back()->with('berhasil', 'Coba Periksa Kembali data yang anda masukkan, sepertinya ada yang salah');
    }

    protected function registered(Request $request, $user){
        return redirect('/siswa');
    }
}
