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
      <li><a href="{{url('galeri')}}">Galeri</a></li>
      <li class="active"><a href="#artikel">Album {{$album->nama}}</a></li>
    </ul>
  </div>
</div>
@endsection

@section('content')
<div id="portfolio" class="section gray">
  <div class="container">
    <center>
      <?php 
        if ($album->status_user == 'pengurus') {
            $dd = App\Models\Pengurus::find($album->id_user);
                $nama = (!empty($dd))? $dd->nama : 'NN';
        }elseif ($album->status_user == 'guru') {
            $dd = App\Models\Pengajars::find($album->id_user);
                $nama = (!empty($dd))? $dd->nama : 'NN';
        }elseif ($album->status_user == 'siswa') {
            $dd = App\Models\Siswas::find($album->id_user);
                $nama = (!empty($dd))? $dd->nama : 'NN';
        }else{
            $nama = 'NN';
        }
      ;?>
      <h4>{{$album->nama}}</h4>
      {{$album->deskripsi}}
      <br><small>Author : <b>{{$nama}}</b></small>
      <br><br>
    </center>
  </div>
  <div class="container">

    <div class="row">
        @foreach($fotos as $foto)
          <div class="gallery-curve-wrapper">
            <img class="materialboxed col l4 m6 s12" data-caption="{{$foto->caption}}" src="{{asset('images/album/'.$foto->foto)}}" style="padding-bottom: 20px">
          </div>
        @endforeach
    </div>
    <br><br>
        {{$fotos->links()}}

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
