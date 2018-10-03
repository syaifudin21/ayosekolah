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
      <li class="active"><a href="{{url('fasilitas')}}">Fasilitas</a></li>
      <li><a href="{{url('galeri')}}">Galeri</a></li>
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
        @foreach($fasilitass as $fasilitas)
        <div class="col l4 m6 s12 gallery-item gallery-expand gallery-filter fasilitas">
          <div class="gallery-curve-wrapper">
            @if(!empty($fasilitas->foto))
            <a class="gallery-cover gray">
              <img class="responsive-img" src="{{asset('images/fasilitas/'.$fasilitas->foto)}}" alt="placeholder">
            </a>
            @endif
            <div class="gallery-header">
              <span>{{$fasilitas->fasilitas}}</span>
            </div>
            <div class="gallery-body">
              <div class="title-wrapper">
                <h3>{{$fasilitas->fasilitas}}</h3>
                <span class="price">{{$fasilitas->created_at}}</span>
              </div>
              <p class="description">{{$fasilitas->deskripsi}}</p>

            </div>
            <div class="gallery-action">
              <a class="btn-floating btn-large waves-effect waves-light"><i class="material-icons">favorite</i></a>
            </div>
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
