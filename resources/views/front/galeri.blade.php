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
      <li class="active"><a href="{{url('galeri')}}">Galeri</a></li>
      <li><a href="{{url('blog')}}">Artikel</a></li>
      <li><a href="{{url('pengumuman')}}">Pengumuman</a></li>
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
      @foreach($galeris as $galeri)
      <?php 
            if ($galeri->status_user == 'pengurus') {
                $dd = App\Models\Pengurus::find($galeri->id_user);
                $nama = (!empty($dd))? $dd->nama : 'NN';
            }elseif ($galeri->status_user == 'guru') {
                $dd = App\Models\Pengajars::find($galeri->id_user);
                $nama = (!empty($dd))? $dd->nama : 'NN';
            }elseif ($galeri->status_user == 'siswa') {
                $dd = App\Models\Siswas::find($galeri->id_user);
                $nama = (!empty($dd))? $dd->nama : 'NN';
            }else{
                $nama = 'NN';
            }
            $foto = App\Models\Foto::where('id_album', $galeri->id)->first();
          ;?>
      @if(!empty($foto))
      <div class="col l4 m6 s12 gallery-filter">
        <div class="card">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="{{asset('images/album/'.$foto->foto)}}">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">{{$galeri->nama}}<i class="material-icons right">more_vert</i></span>
      <p><a href="{{url('album/'.$galeri->id.'/'.$galeri->slug_album)}}">Lihat Foto</a></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">{{$galeri->nama}}<i class="material-icons right">close</i></span>
      <p>{{$galeri->deskripsi}}</p>
    </div>
  </div>
      </div>
      @endif
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
