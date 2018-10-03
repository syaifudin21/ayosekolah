@extends('pengurus.template-pengurus')

@section('content')

<div class="nav-scroller bg-white box-shadow">
   <ul class="nav nav-underline" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" href="{{url('pengurus/prestasi/'.$id)}}">{{$prestasi->nama}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('pengurus/prestasi/edit/'.$id)}}">Update</a>
        </li>
    </ul>
</div>

<br><br>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
<h1 class="h2"> Prestasi {{$prestasi->nama}}</h1>
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
    <li class="breadcrumb-item"><a href="{{url('pengurus/prestasi')}}">Prestasi</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$prestasi->nama}}</li>
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
        <div class="table-responsive-sm">
        <table id="example" class="table table-hover table-sm" style="width:100%">
            <tr><td width="30%"><b>Prestasi</b></td><td><b>{{$prestasi->nama}}</b></td></tr>
            <tr><td>Deskripsi</td><td>{!!$prestasi->deskripsi!!}</td></tr>
            <tr><td>Instalasi</td><td>{!!$prestasi->instalasi!!}</td></tr>
            <tr><td>Tanggal Juara</td><td>{!!$prestasi->tanggal!!}</td></tr>
        </table>
        </div>
    </div>
    <img src="{{url('http://file.smawahasmodel.sch.id/prestasi/'.$prestasi->foto)}}" width="100%">
</div>
@endsection

@section('script')

@endsection
