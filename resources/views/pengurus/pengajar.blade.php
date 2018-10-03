@extends('pengurus.template-pengurus')

@section('content')

<div class="nav-scroller bg-white box-shadow">
   <ul class="nav nav-underline" id="myTab" role="tablist">
        <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tenaga Pengajar</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="profile" aria-selected="false">Pending</a>
        </li>
    </ul>
</div>

<br><br>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
<h1 class="h2">Tenaga Pendidik</h1>
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
    <li class="breadcrumb-item active" aria-current="page">Pengajar</li>
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
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php $n=1;?>
        <tbody>
            @foreach($pengajars as $pengajar)
            <tr>
                <td>{{$n++}}</td>
                <td>{{$pengajar->nama}}</td>
                <td>{{$pengajar->username}}</td>
                <td><a href="{{url('pengurus/pengajar',$pengajar->idp)}}" class="btn btn-outline-success btn-sm">Lihat</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </div>

<div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="profile-tab">
    <div class="table-responsive-sm">
    <table id="example" class="table table-hover table-sm" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Lengkap</th>
                <th>Alamat</th>
                <th>Agama</th>
                <th>L/P</th>
                <th>NIM</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php $n=1;?>
        <tbody>
            @foreach($pendings as $pending)
            <tr>
                <td>{{$n++}}</td>
                <td>{{$pending->nama_lengkap}}</td>
                <td>{{$pending->alamat}}</td>
                <td>{{$pending->agama}}</td>
                <td>{{$pending->jk}}</td>
                <td>{{$pending->nim}}</td>
                <td><a href="{{url('pengurus/pengajar',$pending->id)}}" class="btn btn-outline-success btn-sm">Lihat</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>

</div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $('#example').DataTable();
</script>
@endsection
