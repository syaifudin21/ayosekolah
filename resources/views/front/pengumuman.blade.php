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
      <li><a href="{{url('')}}">Home</a></li>
      <li><a href="{{url('prestasi')}}">Prestasi</a></li>
      <li><a href="{{url('fasilitas')}}">Fasilitas</a></li>
      <li><a href="{{url('galeri')}}">Galeri</a></li>
      <li><a href="{{url('blog')}}">Artikel</a></li>
      <li class="active"><a href="{{url('pengumuman')}}">Pengumuman</a></li>
      <li><a href="{{url('agenda')}}">Agenda</a></li>
      <li><a href="{{url('ekstrakurikuler')}}">Organisasi</a></li>
      
    </ul>
  </div>
</div>
@endsection

@section('content')
<div id="portfolio" class="section gray">
  <div class="container">

  <div class="gallery row">
      @foreach($pengumumans as $pengumuman)
      <?php 
        if ($pengumuman->status_user == 'Pengurus') {
            $dd = App\Models\Pengurus::find($pengumuman->id_user);
            $nama = (!empty($dd))? $dd->nama : 'NN';
        }elseif ($pengumuman->status_user == 'Guru') {
            $dd = App\Models\Pengajars::find($pengumuman->id_user);
            $nama = (!empty($dd))? $dd->nama : 'NN';
        }elseif ($pengumuman->status_user == 'Siswa') {
            $dd = App\Models\Siswas::find($pengumuman->id_user);
            $nama = (!empty($dd))? $dd->nama : 'NN';
        }else{
            $nama = 'NN';
        }
        $warna = substr($pengumuman->id,1);
      ;?>
      <div class="col l4 m6 s12 gallery-filter pengumuman">
          <div class="card-panel {{warna($warna)}}">
            
            <span class="white-text">" {{$pengumuman->isi}} "
              @if(!empty($pengumuman->lampiran))
                <br><br><b> <a class="white-text" href="{{url('http://file.smawahasmodel.sch.id/pengumuman/'.$pengumuman->lampiran)}}">Unduh Lampiran</a></b>
              @endif
             <br> <small>{{$pengumuman->updated_at->diffForHumans()}} - {{$nama}}</small></span>
              
          </div>
      </div>
      @endforeach
  </div>


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
