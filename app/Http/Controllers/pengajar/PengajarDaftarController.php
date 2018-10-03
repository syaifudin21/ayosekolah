<?php

namespace App\Http\Controllers\pengajar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Models\VerificationMember;
use App\Mail\VerificationMailMember;
use App\Models\Pengajar;
use App\Models\Profil_pengajar;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class PengajarDaftarController extends Controller
{
    protected $redirectTo = '/pengajar';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function daftar()
    {
        return view('pengajar.pengajar_daftar');
    }

    public function create(Request $data)
    {
        Validator::make($data->all(), [
            'foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'ijazah' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'nomor_hp' => 'require|string|max:255|unique:pengajars',
        ])->validate();

        $profil = new Profil_pengajar();
        $profil->fill($data->all());

        if ($data->hasFile('foto')){
            $filenamewithextension = $data->file('foto')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $data->file('foto')->getClientOriginalExtension();
            $filenametostorefoto = $filename.'_'.uniqid().'.'.$extension;
            $data->file('foto')->move('images/pengajar',$filenametostorefoto);
            $profil['foto'] = $filenametostorefoto;
        }
        if ($data->hasFile('ijazah')){
            $filenamewithextension = $data->file('ijazah')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $data->file('ijazah')->getClientOriginalExtension();
            $filenametostoreijazah = $filename.'_'.uniqid().'.'.$extension;
            $data->file('ijazah')->move('images/pengajar',$filenametostoreijazah);
            $profil['ijazah'] = $filenametostoreijazah;
        }

        $profil->save();

        return back()->with('success', 'Berhasil Mengajukan Data');
    }

    protected function registered(Request $request, $user){
        return redirect('/pengajar');
    }
}
