<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Artikel;
use App\Models\Agenda;
use App\Models\Pengumuman;
use App\Models\Atribut;
use App\Models\Profil_pengajar;
use App\Models\Fasilitas;
use App\Models\Ekstrakurikuler;
use App\Models\Prestasi;
use App\Models\Album;
use App\Models\Foto;
use App\Models\Profil_siswa;
use App\Models\Masukkan;
use DB;
use Alert;

class HomeController extends Controller
{
    public function index()
    {
        $artikels = Artikel::where('status', '1')->get();
        $agendas = Agenda::where('status_tampil', 'Tampil')->take(5)->get();
        $visi = Atribut::where('atribut', 'visi')->select('deskripsi')->first();
        $misi = Atribut::where('atribut', 'misi')->select('deskripsi')->first();
        $maps = Atribut::where('atribut', 'maps')->select('deskripsi')->first();
        $akriditasi = Atribut::where('atribut', 'akriditasi')->select('deskripsi')->first();
        return view('front.index', compact('artikels', 'agendas', 'visi', 'misi', 'maps', 'akriditasi'));
    }
    public function daftar()
    {
    	$tahun = Carbon::now()->format('Y');
    	$tampil = [$tahun, $tahun-1, $tahun-2, $tahun-3, $tahun-5];
        return view('front.daftar', compact('tampil'));
    }
    public function pengajar()
    {
        $pengajars = Profil_pengajar::join('pengajars', 'profil_pengajars.id_pengajar', '=', 'pengajars.id')->get();
        return view('front.pengajar', compact('pengajars'));
    }
    public function blog()
    {
        $artikels = Artikel::where('status', '1')->orderBy('created_at', 'desc')->paginate(10);
        return view('front.blog', compact('artikels'));
    }
    public function agenda()
    {
        $agendas = Agenda::where('status_tampil', 'Tampil')->paginate(10);
        return view('front.agenda', compact('agendas'));
    }
    public function pengumuman()
    {
        $pengumumans = Pengumuman::where(['objek'=>'Umum', 'status'=>'Tampil'])
                        ->whereDate('waktu_mulai', '<=', Carbon::now())
                        ->whereDate('waktu_selesai', '>=', Carbon::now())
                        ->get();
        // dd($pengumumans);
        return view('front.pengumuman', compact('pengumumans'));
    }
    public function artikel($id)
    {
        $artikel = Artikel::find($id);
        return view('front.artikel-id', compact('artikel'));
    }
    public function fasilitas()
    {
        $fasilitass = Fasilitas::all();
        return view('front.fasilitas', compact('fasilitass'));
    }
    public function ekstrakurikuler()
    {
        $ekstrakurikulers = Ekstrakurikuler::all();
        return view('front.ekstrakurikuler', compact('ekstrakurikulers'));
    }
    public function profil()
    {
        return view('front.profil');
    }
    public function prestasi()
    {
        $prestasis = Prestasi::all();
        return view('front.prestasi', compact('prestasis'));
    }
    public function galeri()
    {
        $galeris = Album::all();
        return view('front.galeri', compact('galeris'));
    }
    public function album($id)
    {
        $album = Album::find($id);
        $fotos = Foto::where('id_album', $id)->paginate(9);
        return view('front.album', compact('album', 'fotos'));
    }
    public function tatatertib()
    {
        $tatatertib = Atribut::where('atribut', 'tatatertib')->select('deskripsi')->first()->deskripsi;
        return view('front.tatatertib', compact('tatatertib'));
    }
    public function alur()
    {
        return view('front.alur');
    }
    public function brosur()
    {
        return view('front.brosur');
    }
    public function carihasil()
    {
        return view('front.hasil-seleksi');
    }
    public function hasilseleksi(Request $request)
    {
        $siswa = Profil_siswa::where('nim', $request->nisn)->first();
        if (empty($siswa)) {
            $kalimat = 'Anda Belum melakukan pendftaran sebelumnya';
        }elseif (!empty($siswa) && $siswa->status=='Daftar') {
            $kalimat = 'Seleksi belum dilakukan, silahkan menunggu pengumaman, atau lakukan konfirmasi ke panitia PMB';
        }elseif (!empty($siswa) && $siswa->status=='Gagal') {
            $kalimat = 'Maaf anda gagal melalui Tes';
        }elseif (!empty($siswa) && $siswa->status=='Diterima') {
            $kalimat = 'Anda Diterima, silahkan melakukan pendaftaran ulang di sekertariat';
        }
        return redirect('hasil-seleksi')->with('success', $kalimat);
    }
    public function storemasukan(Request $request)
    {
        $saran = new Masukkan();
        $saran->fill($request->all());
        $saran->save();
        Alert::success('Terimakasih Saran dan Masukan Anda Sangat Membantu Kami', 'Berhasil');
        return  back();
    }

}
