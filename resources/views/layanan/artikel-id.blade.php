@extends($template)

@section('content')

<div class="nav-scroller bg-white box-shadow">
   <ul class="nav nav-underline" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" href="{{url($auth.'/artikel/'.$id)}}">{{$artikel->judul}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url($auth.'/artikel/edit/'.$id)}}">Update</a>
        </li>
    </ul>
</div>

<br><br>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
<h1 class="h2"> Artikel {{$artikel->judul}}</h1>
<div class="btn-toolbar mb-2 mb-md-0">
  <div class="btn-group mr-2">
    <a href="{{url($auth.'/artikel/edit/'.$artikel->id)}}" class="btn btn-outline-primary btn-sm">Update</a> 
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
    <li class="breadcrumb-item"><a href="{{url($auth.'/artikel')}}">Artikel</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$artikel->judul}}</li>
  </ol>
</nav>

@if(Session::has('success'))
  <div class="alert alert-info alert-dismissable">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      {{ Session::get('success') }}
  </div>
@endif

<?php 
    if ($artikel->status_user == 'pengurus') {
        $dd = App\Models\Pengurus::find($artikel->id_user);
            $nama = (!empty($dd))? $dd->nama : 'NN';
    }elseif ($artikel->status_user == 'guru') {
        $dd = App\Models\Pengajars::find($artikel->id_user);
            $nama = (!empty($dd))? $dd->nama : 'NN';
    }elseif ($artikel->status_user == 'siswa') {
        $dd = App\Models\Siswas::find($artikel->id_user);
            $nama = (!empty($dd))? $dd->nama : 'NN';
    }else{
        $nama = 'NN';
    }
?>

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <div class="row">
        <div class="col-md-9 col-xs-12">
          <div class="table-responsive-sm">
          <table id="example" class="table table-hover table-sm" style="width:100%">
              <tr><td width="30%"><b>Judul</b></td><td>{{$artikel->judul}}</td></tr>
              <tr><th>Status User</th><td>{{$artikel->status_user}}</td></tr>
              <tr><th>Nama</th><td>{{$nama}}</td></tr>
              <tr><td><b>Tag</b></td><td>{{$artikel->tag}}</td></tr>
              <tr><td><b>Teks Pembuka</b></td><td>{{$artikel->text_pembuka}}</td></tr>
          </table>
          </div>
        </div>
        @if(!empty($artikel->lampiran))
        <div class="col-md-3 col-xs-12">
              <img src="{{url('http://file.smawahasmodel.sch.id/artikel/'.$artikel->lampiran)}}" width="100%">
        </div>
        @endif
      </div>

    {!!$artikel->artikel!!}
    </div>

</div>
@endsection

@section('script')

@endsection
