@extends('front.template')

@section('title')
<div class="nav-header">
  <div class=" center">
  <h1>Selamat Datang </h1>
  <div class="tagline">Mengutamakan <span class="element"></span> </div>
  </div>
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
      <li class="active"><a href="#home">Home</a></li>
      <li><a href="{{url('prestasi')}}">Prestasi</a></li>
      <li><a href="{{url('fasilitas')}}">Fasilitas</a></li>
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

  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="medium material-icons">flash_on</i></h2>
            <h5 class="center">Speeds up development</h5>

            <p class="light">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="medium material-icons">group</i></h2>
            <h5 class="center">User Experience Focused</h5>

            <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="medium material-icons">settings</i></h2>
            <h5 class="center">Easy to work with</h5>

            <p class="light">We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.</p>
          </div>
        </div>
      </div>

    </div>
    <br><br>
  </div>

  <div class="parallax-container valign-wrapper" style="height: 200px;">
      <div class="container">
        <div class="row center">
          <h4>Visi</h4>
          <p style="font-size: 20px;">
            @if(!empty($visi))
              {!!$visi->deskripsi!!}
            @endif
          </p>
        </div>
      </div>
    <div class="parallax"><img src="{{asset('images/standar/background1.png')}}" alt="Unsplashed background img 2"></div>
  </div>
  
<div id="portfolio" class="section gray">
  <div class="container">
    <div class="gallery row">
      <div class="gallery-item gallery-expand gallery-filter artikel active">
        <div class="col s12 m8">
        @if(!empty($artikels))
        @foreach($artikels as $artikel)
          <div class="row">
          <div class="col s3">
            <img src="{{asset('images/siswa/Desert.jpg')}}" width="100%" style="margin: 6px auto;">
          </div>
          <div class="col s9">
            <a href="{{url('artikel/'.$artikel->id.'/'.$artikel->slug_judul)}}" style="color: black"><h5>{{$artikel->judul}}</h5></a>
            <span>Author : Syaifudin - {{$artikel->updated_at->diffForHumans()}}</span>
            <p>{{$artikel->text_pembuka}} .... <a href="{{url('artikel/'.$artikel->id.'/'.$artikel->slug_judul)}}">Lihat Selengkapnya</a> </p>
          </div>
        </div>
        @endforeach
        @else
        Artikel kosong
        @endif
        
        </div>
        <div class="col s12 m4">

        @if(!empty($agendas))
          @foreach($agendas as $agenda)
          <div class="row">
            <div class="col s4">
              <div class="date">
                <span class="binds"></span>
                <span class="month">{{bulan_indo(date('n', strtotime($agenda->waktu)))}}</span>
                <h1 class="day">{{date('d', strtotime($agenda->waktu))}}</h1>
              </div>
            </div>
            <div class="col s8">
              <b>{{$agenda->agenda}}</b><br>
              {{$agenda->keterangan}}
            </div>
          </div>
          @endforeach
           @else
        Artikel kosong
        @endif

        </div>

      </div>

  </div>

  </div>
</div>

  <div class="parallax-container valign-wrapper" style="height: 300px;">
      <div class="container">
        <div class="row center">
          <h4>Misi</h4>
        </div>
        @if(!empty($misi))
        {!!$misi->deskripsi!!}
        @endif
      </div>
    <div class="parallax"><img src="{{asset('images/standar/background1.png')}}" alt="Unsplashed background img 2"></div>
  </div>

<div id="portfolio" class="section ">
  <div class="container">
  <div class="row">
      
      <div class="col m6 s12">
        <div class="icon-block">
            <h2 class="center light-blue-text">{{$profil->akriditasi}}</h2>
            <h5 class="center">Status Akriditasi</h5>
            @if(!empty($akriditasi))
            <p class="light">{!!$akriditasi->deskripsi!!}</p>
            @else
            By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.
            @endif
        </div>
      </div>
      <div class="col m6 s12">
      <form action="{{route('masukkan.baru')}}" method="post">
      {{ csrf_field() }}
        <div class="input-field">
          <input id="nama" type="text" class="validate" name="nama" value="{{ old('nama') }}" required>
          <label for="first_name">Nama</label>
        </div>
        <div class="input-field">
          <input id="hp" type="number" class="validate" name="hp" value="{{ old('hp') }}" required>
          <label for="first_name">Nomor HP</label>
        </div>
        <div class="input-field">
          <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required>
          <label for="first_name">Email</label>
        </div>
        <div class="input-field">
          <textarea class="materialize-textarea" name="pesan">{{old('pesan')}}</textarea>
          <label for="first_name">Pesan Masukkan saran</label>
        </div>
        <div class="input-field">
          <button class="btn light-blue darken-3 col s12" type="submit">Kirim Saran
              <i class="material-icons right">send</i>
          </button>
        </div>
      </form>

      </div>
  </div>
</div>
<br><br>
</div>

@if(!empty($maps))
<div class="row">
   <iframe class="col m12" src="{{$maps->deskripsi}}" width="800" height="300" frameborder="0" style="border:0"></iframe>
</div>
@endif


@endsection

@section('script')
<script type="text/javascript" src="{{asset('js/typed.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
      $('.parallax').parallax();
    });
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
