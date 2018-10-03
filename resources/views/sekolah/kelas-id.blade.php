@extends('sekolah.template-sekolah')

@section('content')

<div class="nav-scroller bg-white box-shadow">
   <ul class="nav nav-underline" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" href="{{url('sekolah/kelas/id/'.$kelas->id)}}">{{$kelas->kelas}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('sekolah/kelas/update/'.$kelas->id)}}">update</a>
        </li>
    </ul>
</div>

<br><br>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
<h1 class="h2"> Kelas {{$kelas->kelas}}</h1>
<div class="btn-toolbar mb-2 mb-md-0">
  <div class="btn-group mr-2">
    <button class="btn btn-sm btn-outline-secondary">Update</button>
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
    <li class="breadcrumb-item"><a href="{{url('sekolah/kelas/'.$kelas->id_ta)}}">Tahun Ajaran {{$kelas->tahun_ajaran}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$kelas->kelas}}</li>
  </ol>
</nav>

{!!$kelas->deskripsi!!} <br><br>

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
    <tr><th width="150px">Nama Kelas</th><td>{{$kelas->kelas}}</td></tr>
    <tr><th>Jurusan</th><td>{{$kelas->jurusan}}</td></tr>
    <tr><th>Tingkat Kelas</th><td>{{$kelas->tingkat_kelas}}</td></tr>
    <tr><th>Id Guru</th><td>{{$kelas->id_guru}}</td></tr>
    <tr><th>Tanggal Buka</th><td>{{$kelas->tgl_buka}}</td></tr>
    <tr><th>Tanggal Tutup</th><td>{{$kelas->tgl_tutup}}</td></tr>
    <tr><th>Tanggal Arsip</th><td>{{$kelas->tgl_arsip}}</td></tr>
    <tr><th>Status</th><td>{{$kelas->status}}</td></tr>
</table>

<hr>
<table class="table table-hover table-sm" style="width:100%">
<thead>
    <tr>
        <th>#</th>
        <th>Mata Pelajaran</th>
        <th>Jenis Mata Pelajaran</th>
        <th>Action</th>
    </tr>
</thead>
<?php $n=1;?>
<tbody>
    @foreach($mapels as $mapel)
    <tr>
        <td>{{$n++}}</td>
        <td>{{$mapel->mapel}}</td>
        <?php 
            $jenis_mapel = App\Models\Jenis_mapel::find($mapel->id_jenis_mapel);
        ?>
        <td>{{(!empty($jenis_mapel))? $jenis_mapel->jenis_mapel : ''}}</td>
        <form method="POST" action="{{url('sekolah/mapel/delete/'.$mapel->id)}}">
        <td>
              <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#exampleModalupdate"
                        data-mapel="{{$mapel->mapel}}" 
                        data-deskripsi="{{$mapel->deskripsi}}" 
                        data-id_jenis_mapel="{{$mapel->id_jenis_mapel}}" 
                        data-id="{{$mapel->id}}"
                        >Tambah Guru</button> 
        </td>
        </form>
    </tr>
    @endforeach
</tbody>

</div>
    </div>

</div>

@endsection

@section('script')
@endsection
