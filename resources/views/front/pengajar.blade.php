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
      <li class="active"><a href="#pengajar">Tenaga Pengajar</a></li>
    </ul>
  </div>
</div>
@endsection

@section('content')
<div id="portfolio" class="section gray">
  <div class="container">

  <div class="gallery row">
      @foreach($pengajars as $pengajar)
      <div class="col l4 m6 s12 gallery-item gallery-expand gallery-filter pengajar">
        <div class="gallery-curve-wrapper">
          @if(!empty($pengajar->foto))
          <a class="gallery-cover gray">
            <img class="responsive-img" src="{{asset('images/pengajar/'.$pengajar->foto)}}" alt="placeholder">
          </a>
          @endif
          <div class="gallery-header">
            <span>{{$pengajar->nama_lengkap}}</span>
          </div>
          <div class="gallery-body">
            <div class="title-wrapper">
              <h3>{{$pengajar->nama_lengkap}}</h3>
              <span class="price">{{$pengajar->nim}}</span>
            </div>
            <p class="description">{{$pengajar->moto}}</p>

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
