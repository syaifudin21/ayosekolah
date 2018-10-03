<?php

namespace App\Http\Controllers\sekolah;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Tahun_ajaran;
use App\Models\Kurikulum;
use App\Models\Jurusan;
use App\Models\Tingkat_kelas;
use App\Models\Mapel;
use App\Models\Jenis_mapel;

class TahunAjaranController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:sekolah');
    }
    public function tahunajaran()
    {
        $ta = Tahun_ajaran::all();
        return view('sekolah.tahun_ajaran', compact('ta'));
    }
    public function tatambah(Request $request)
    {
        $profil = new Tahun_ajaran();
        $profil->fill($request->all());
        if ($request->hasFile('jadwal')){
            $filenamewithextension = $request->file('jadwal')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('jadwal')->getClientOriginalExtension();
            $filenametostorefoto = $filename.'_'.uniqid().'.'.$extension;
            Storage::disk('ftp-standar')->put($filenametostorefoto, fopen($request->file('jadwal'), 'r+'));
            $profil['jadwal'] = $filenametostorefoto;
        }
        if ($request->hasFile('brosur')){
            $filenamewithextension = $request->file('brosur')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('brosur')->getClientOriginalExtension();
            $filenametostorefoto = $filename.'_'.uniqid().'.'.$extension;
            Storage::disk('ftp-standar')->put($filenametostorefoto, fopen($request->file('brosur'), 'r+'));
            $profil['brosur'] = $filenametostorefoto;
        }
        $profil->save();

        return back()->with('success','Penambahan Tahun Ajaran Berhasil');
    }
    public function taid($id)
    {
    	$ta = Tahun_ajaran::find($id);
    	return view('sekolah.tahun_ajaran-update', compact('ta'));
    }
    public function taupdate(Request $request)
    {
        $ta = Tahun_ajaran::find($request->id);
        $tah = Tahun_ajaran::find($request->id);
        $ta->fill($request->all());
        if ($request->hasFile('jadwal')){
            $filenamewithextension = $request->file('jadwal')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('jadwal')->getClientOriginalExtension();
            $filenametostorefoto = $filename.'_'.uniqid().'.'.$extension;
            Storage::disk('ftp-standar')->put($filenametostorefoto, fopen($request->file('jadwal'), 'r+'));
            Storage::disk('ftp-standar')->delete($tah->jadwal);
            $ta['jadwal'] = $filenametostorefoto;
        }
        if ($request->hasFile('brosur')){
            $filenamewithextension = $request->file('brosur')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('brosur')->getClientOriginalExtension();
            $filenametostorefoto = $filename.'_'.uniqid().'.'.$extension;
            Storage::disk('ftp-standar')->put($filenametostorefoto, fopen($request->file('brosur'), 'r+'));
            Storage::disk('ftp-standar')->delete($tah->brosur);
            $ta['brosur'] = $filenametostorefoto; }
        $ta->update();

        return back()->with('success','Penambahan Tahun Ajaran Berhasil');
    }
    public function kurikulum()
    {
    	$kurikulums = Kurikulum::all();
    	return view('sekolah.kurikulum', compact('kurikulums'));
    }
    public function kurikulumstore(Request $request)
    {
    	$kurikulum = new Kurikulum();
        $kurikulum->fill($request->all());
        $kurikulum->save();
        return back()->with('success', 'Berhasil menambahkan kurikulum baru');
    }
    public function kurikulumid($id)
    {
    	$kurikulum = Kurikulum::find($id);
    	return view('sekolah.kurikulum-id', compact('kurikulum'));
    }
    public function kurikulumupdate(Request $request)
    {
    	$kurikulum = Kurikulum::find($request->id);
        $kurikulum->fill($request->all());
        $kurikulum->update();

        return back()->with('success','Berhasil Update Kurikulum');
    }
    public function jurusan($id_kurikulum)
    {
        $kurikulum = Kurikulum::find($id_kurikulum);
		$jurusans = Jurusan::where('id_kurikulum', $id_kurikulum)->get();
    	return view('sekolah.kurikulum-jurusan', compact('jurusans', 'kurikulum'));
    }

    public function jurusanstore(Request $request)
    {
    	$jurusan = new Jurusan();
        $jurusan->fill($request->all());
         if ($request->hasFile('foto')){
            $filenamewithextension = $request->file('foto')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('foto')->getClientOriginalExtension();
            $filenametostorefoto = $filename.'_'.uniqid().'.'.$extension;
            Storage::disk('ftp-standar')->put($filenametostorefoto, fopen($request->file('foto'), 'r+'));
            $jurusan['foto'] = $filenametostorefoto;
        }
        $jurusan->save();
        return back()->with('success', 'Berhasil menambahkan Jurusan baru');
    }
    public function jurusanid($id)
    {
    	$jurusan = Jurusan::find($id);
    	return view('sekolah.jurusan-id', compact('kurikulum'));
    }
    public function jurusanupdate(Request $request)
    {
        $jurusan = Jurusan::find($request->id);
    	$jurusand = Jurusan::find($request->id);
        $jurusan->fill($request->all());
        if ($request->hasFile('foto')){
            $filenamewithextension = $request->file('foto')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('foto')->getClientOriginalExtension();
            $filenametostorefoto = $filename.'_'.uniqid().'.'.$extension;
            Storage::disk('ftp-standar')->put($filenametostorefoto, fopen($request->file('foto'), 'r+'));
            Storage::disk('ftp-standar')->delete($jurusand->foto);
            $jurusan['foto'] = $filenametostorefoto;
        }
        $jurusan->update();

        return back()->with('success','Berhasil Update Jurusan');
    }
    public function tk($id_jurusan)
    {
        $jurusan = Jurusan::where('jurusans.id', $id_jurusan)
                    ->join('kurikulums', 'jurusans.id_kurikulum', '=', 'kurikulums.id')
                    ->first();
        $tks = Tingkat_kelas::where('id_jurusan', $id_jurusan)->get();
    	$jps = Jenis_mapel::where('id_jurusan', $id_jurusan)->get();
    	return view('sekolah.tk', compact('tks', 'jurusan', 'jps', 'id_jurusan'));
    }

    public function tkstore(Request $request)
    {
    	$tk = new Tingkat_kelas();
        $tk->fill($request->all());
        $tk->save();
        return back()->with('success', 'Berhasil menambahkan Tingkatan Kelas baru');
    }
    public function tkid($id)
    {
    	$tk = Tingkat_kelas::find($id);
    	return view('sekolah.tk-id', compact('kurikulum'));
    }
    public function tkupdate(Request $request)
    {
    	$tk = Tingkat_kelas::find($request->id);
        $tk->fill($request->all());
        $tk->update();

        return back()->with('success','Berhasil Update Tingkatan Kelas');
    }
    public function mapel($id_tk)
    {
    	$mapels = Mapel::where('id_tingkat_kelas', $id_tk)->get();
        $tk = Tingkat_kelas::where('tingkat_kelas.id', $id_tk)
                ->join('jurusans', 'tingkat_kelas.id_jurusan', '=', 'jurusans.id')
                ->join('kurikulums', 'jurusans.id_kurikulum', '=', 'kurikulums.id')
                ->first();
        $jps = Jenis_mapel::where('id_jurusan', $tk->id_jurusan)->get();
    	return view('sekolah.mapel', compact('mapels', 'jps','id_tk', 'tk'));
    }

    public function mapelstore(Request $request)
    {
    	$mapel = new Mapel();
        $mapel->fill($request->all());
        $mapel->save();
        return back()->with('success', 'Berhasil menambahkan Mata Pelajaran baru');
    }
    public function mapelid($id)
    {
    	$mapel = Mapel::find($id);
    	return view('sekolah.mapel-id', compact('mapel'));
    }
    public function mapelupdate(Request $request)
    {
    	$mapel = Mapel::find($request->id);
        $mapel->fill($request->all());
        $mapel->update();

        return back()->with('success','Berhasil Update Mata Pelajaran');
    }
    public function mapeldelete($id)
    {
        Mapel::find($id)->delete();
        return back()->with('success','Berhasil Hapus Mata Pelajaran');
    }
    public function jenismapelstore(Request $request)
    {
        $mapel = new Jenis_mapel();
        $mapel->fill($request->all());
        $mapel->save();

        return back()->with('success','Berhasil Tambah Jenis Mata Pelajaran');
    }
    public function jenismapelid($id)
    {
        $jp = Jenis_mapel::find($id);
        return view('sekolah.jp-id', compact('jp'));
    }
    public function jenismapelupdate(Request $request)
    {
        $jenismapel = Jenis_mapel::find($request->id);
        $jenismapel->fill($request->all());
        $jenismapel->update();

        return back()->with('success','Berhasil Update Jenis Mata Pelajaran');
    }
}
