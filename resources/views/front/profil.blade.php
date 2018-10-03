@extends('front.template')

@section('title')
<div class="nav-header center">
  <h1>Selamat Datang </h1>
  <div class="tagline">Mengutamakan <span class="element"></span> </div>
</div>
@endsection

@section('background', asset('images/standar/banner1.jpg'))

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/event.css')}}">
@endsection

@section('menu')
<div class="categories-wrapper blue darken-3">
  <div class="categories-container">
    <ul class="container categories">
      <li><a href="#">Profil {{$profil->nama_sekolah}}</a></li>
    </ul>
  </div>
</div>
@endsection

@section('content')
<div id="portfolio" class="section gray">
  <div class="container">

    <table class="bordered highlight">

          <tr>
              <th>Nama Sekolah</th>
              <td>{{$profil->nama_sekolah}}</td>
          </tr>
          <tr>
              <th>NPSN</th>
              <td>{{$profil->npsn}}</td>
          </tr>
          <tr>
              <th>Jenjang</th>
              <td>{{$profil->jenjang}}</td>
          </tr>
          <tr>
              <th>Status</th>
              <td>{{$profil->status}}</td>
          </tr>
          <tr>
              <th>Alamat</th>
              <td>{{$profil->alamat}}</td>
          </tr>
          <tr>
              <th>Kode Pos</th>
              <td>{{$profil->kode_pos}}</td>
          </tr>
          <tr>
              <th>Nomor SK</th>
              <td>{{$profil->sk}}</td>
          </tr>
          <tr>
              <th>SK Izin</th>
              <td>{{$profil->sk_izin}}</td>
          </tr>
          <tr>
              <th>Tanggal SK</th>
              <td>{{$profil->tgl_sk}}</td>
          </tr>
          <tr>
              <th>Status Kepemilikan</th>
              <td>{{$profil->status_kepemilikan}}</td>
          </tr>
          <tr>
              <th>Luas Tanah Milik Sendiri</th>
              <td>{{$profil->luastanah_milik}}</td>
          </tr>
          <tr>
              <th>Luas Tanah Bukan Milik</th>
              <td>{{$profil->luastanah_bukan}}</td>
          </tr>
          <tr>
              <th>Nama Wajib Pajak</th>
              <td>{{$profil->nama_wajib_pajak}}</td>
          </tr>
          <tr>
              <th>NPWP</th>
              <td>{{$profil->npwp}}</td>
          </tr>
          <tr>
              <th>No Telephon</th>
              <td>{{$profil->no_telp}}</td>
          </tr>
          <tr>
              <th>No Fax</th>
              <td>{{$profil->no_fax}}</td>
          </tr>
          <tr>
              <th>Email</th>
              <td>{{$profil->email}}</td>
          </tr>
          <tr>
              <th>Website</th>
              <td>{{$profil->website}}</td>
          </tr>
          <tr>
              <th>Waktu Sekolah</th>
              <td>{{$profil->waktu_sekolah}}</td>
          </tr>
          <tr>
              <th>Menerima Bos?</th>
              <td>{{$profil->menerima_bos}}</td>
          </tr>
          <tr>
              <th>Sertifikasi ISO</th>
              <td>{{$profil->sertifikasi_iso}}</td>
          </tr>
          <tr>
              <th>Sumber Listrik</th>
              <td>{{$profil->sumber_listrik}}</td>
          </tr>
          <tr>
              <th>Daya Listrik</th>
              <td>{{$profil->daya_listrik}}</td>
          </tr>
          <tr>
              <th>Akses Internet</th>
              <td>{{$profil->akses_internet}}</td>
          </tr>
          <tr>
              <th>Nama Kepala Sekolah</th>
              <td>{{$profil->kepala_sekolah}}</td>
          </tr>
          <tr>
              <th>Akriditasi</th>
              <td>{{$profil->akriditasi}}</td>
          </tr>
          <tr>
              <th>Kurikulum</th>
              <td>{{$profil->kurikulum}}</td>
          </tr>
          <tr>
              <th>Logo</th>
              <td>{{$profil->logo}}</td>
          </tr>
          
      </table>
  </div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{asset('js/typed.min.js')}}"></script>
<script type="text/javascript">
   document.addEventListener("DOMContentLoaded", function() {
          new Typed('.element', {
          cursorChar: '|',
          strings: ["Menciptakan Dunia dalam Genggaman.", "Membantu dan Menghubungkan Guru dan Siswa", "Memudahkan Pengawasan Perkembangan Siswa"],
          startDelay: 1000,
          showCursor: true,
          autoInsertCss: true,
          backDelay: 2000,
          typeSpeed: 100,
          backSpeed: 20,
          // smartBackspace: false, // this is a default
          loop: true
        });
    });
</script>
@endsection