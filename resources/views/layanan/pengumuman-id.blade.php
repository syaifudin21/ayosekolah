@extends($template)

@section('content')

<div class="nav-scroller bg-white box-shadow">
   <ul class="nav nav-underline" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" href="{{url(strtolower($auth).'/'.$menu.'/pengumuman/'.$pengumuman->id.'/'.$pengumuman->slug_pengumuman)}}">{{$pengumuman->nama_pengumuman}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url(strtolower($auth).'/'.$menu.'/pengumuman/update/'.$pengumuman->id.'/'.$pengumuman->slug_pengumuman)}}">Update</a>
        </li>
    </ul>
</div>

<br><br>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
<h1 class="h2"> Pengumuman {{$pengumuman->nama_pengumuman}}</h1>
<div class="btn-toolbar mb-2 mb-md-0">
  <div class="btn-group mr-2">
    <button class="btn btn-sm btn-outline-secondary">Share</button>
    <button class="btn btn-sm btn-outline-secondary">Export</button>
  </div>
  <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
    <span data-feather="calendar"></span>
    This week
  </button>
</div>
</div>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-white" style="padding: 0px">
    <li class="breadcrumb-item"><a href="{{url(strtolower($auth).'/'.$menu.'/pengumuman')}}">Pengumuman</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$pengumuman->nama_pengumuman}}</li>
  </ol>
</nav>

@if(Session::has('success'))
  <div class="alert alert-info alert-dismissable">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      {{ Session::get('success') }}
  </div>
@endif

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <div class="row">
        <div class="col-md-9 col-xs-12">
          <div class="table-responsive-sm">
          <table id="example" class="table table-hover table-sm" style="width:100%">
              <tr><td width="30%"><b>Pengumuman</b></td><td>{{$pengumuman->nama_pengumuman}}</td></tr>
              <tr><td><b>Waktu Tayang</b></td><td>{{$pengumuman->waktu_mulai }} s/d {{$pengumuman->waktu_selesai}}</td></tr>
              <tr><td><b>Pembuat Pengumuman</b></td><td>{{$pengumuman->status_user}} - {{$pengumuman->id_user}}</td></tr>
              <tr><td><b>Penerima Pengumuman</b></td><td>{{$pengumuman->objek}} - {{$pengumuman->id_objek}}</td></tr>
              <tr><td><b>Status</b></td><td>{{$pengumuman->status}}</td></tr>
              <tr><td><b>Isi Pengumuman</b></td><td>{{$pengumuman->isi}}</td></tr>
          </table>
          </div>
        </div>
        @if(!empty($pengumuman->lampiran))
        <div class="col-md-3 col-xs-12">
              <img src="{{asset('http://file.smawahasmodel.sch.id/pengumuman/'.$pengumuman->lampiran)}}" width="100%">
        </div>
        @endif
      </div>

    </div>

</div>
@endsection

@section('script')

@endsection
