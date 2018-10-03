@extends('siswa.template-siswabaru')
@section('warna','blue')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/event.css')}}">
@endsection

@section('content')
<div id="portfolio" class="section white">
<div class="container">

  <div id="dasbord" class="col s12">
    <div class="row">

      
    </div>
  </div>

  
</div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
<script type="text/javascript">
  var densityCanvas = document.getElementById("densityChart");

  Chart.defaults.global.defaultFontSize = 12;

  var densityData = {
    label: 'Perkembangan Nilai',
    data: [40, 50, 70, 55, 65, 45, 70, 80, 60, 95, 50, 60, 70, 90, 60, 50]
  };

  var barChart = new Chart(densityCanvas, {
    type: 'bar',
    data: {
      labels: ["Matematika", "Fisika", "Kimia", "Bhs. Indonesia", "Geografi", "Al-Quran", "Aqidah Akhlaq", "Fiqih", "SKI", "Bhs. Inggris", "Biologi", "Sejarah", "Ekonomi", "PenjasOrkes", "Aswaja", "Bhs. Arab"],
      datasets: [densityData]
    }
  });

  $(document).ready(function() {
    @if(Session::has('berhasil'))
      Materialize.toast('{{ Session::get('berhasil') }}', 4000);
    @endif
    $('ul.tabs').tabs();
  });
</script>
@endsection