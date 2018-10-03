<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Particles background using Particles.js</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/particles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/util.css') }}">
</head>

<body>

  <div id="particles-js"></div>
  @yield('content')

  <script src='{{ asset('js/app.js') }}'></script>
  <script src='{{ asset('js/particles.js') }}'></script>
  <script src='{{ asset('js/particles-setting.js') }}'></script>
  <script src='{{ asset('js/tilt.jquery.min.js') }}'></script>
</body>
</html>
