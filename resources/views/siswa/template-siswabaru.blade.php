<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Lato Font -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>

    <!-- Stylesheet -->
    <link href="{{asset('materialize/css/gallery-materialize.min.css')}}" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    @yield('css')

  </head>

  <body>

    <!-- Navbar and Header -->
    <nav class="nav-extended @yield('warna')">
      <div class="nav-background">
        <div class="pattern active" style="background-image: url('{{asset('images/standar/1400x300.png')}}');"></div>
      </div>
      <div class="nav-wrapper container">
        <a href="index.html" class="brand-logo"><i class="material-icons">camera</i>{{$profil->nama_singkat_sekolah}}</a>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li class="active"><a href="{{url('/')}}">Muhammad Syaifudin</a></li>
        </ul>
        <!-- Dropdown Structure -->
        
      </div>

      <!-- Fixed Masonry Filters -->
      @yield('menu')
      
    </nav>
    <ul class="side-nav" id="nav-mobile">
      <li><a href="blog.html"><i class="material-icons">edit</i>Artikel</a></li>
      <li><a href="docs.html"><i class="material-icons">school</i>Pencapaian</a></li>
      <li><a href="horizontal.html"><i class="material-icons">forum</i>Chatting</a></li>
      <li><a href="no-image.html"><i class="material-icons">import_export</i>Eksport</a></li>
      <li><a href="no-image.html"><i class="material-icons">power_settings_new</i>Logout</a></li>
    </ul>

    <form id="logout-form" action="{{ route('logout') }}" method="POST">
      @csrf
    </form>

    @yield('content')

    

    <!-- Core Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="{{asset('materialize/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('materialize/js/masonry.pkgd.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/materialize/0.98.0/js/materialize.min.js"></script>
    <script src="{{asset('materialize/js/color-thief.min.js')}}"></script>
    <script src="{{asset('materialize/js/galleryExpand.js')}}"></script>
    <script src="{{asset('materialize/js/init.js')}}"></script>
    
    @yield('script')

  </body>
</html>