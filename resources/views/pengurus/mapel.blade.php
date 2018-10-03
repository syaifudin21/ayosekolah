@extends('pengurus.template-pengurus')

@section('content')

<div class="nav-scroller bg-white box-shadow">
   <ul class="nav nav-underline" id="myTab" role="tablist">
        <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Mata Pelajaran</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#tambah" role="tab" aria-controls="profile" aria-selected="false">Tambah</a>
        </li>
    </ul>
</div>

<br><br>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
<h1 class="h2">Mata pelajaran</h1>
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
    <li class="breadcrumb-item active" aria-current="page">Mata Pelajaran</li>
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
                <th>Mata Pelajaran</th>
                <th>Deskripsi</th>
                <th>Jenis Mata Pelajaran</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php $n=1;?>
        <tbody>
            @foreach($mapel as $mapel)
            <tr>
                <td>{{$n++}}</td>
                <td>{{$mapel->mapel}}</td>
                <td>{{$mapel->deskripsi}}</td>
                <td>{{$mapel->jenis_mapel}}</td>
                <form method="POST" action="{{url('pengurus/mapel/delete/'.$mapel->id)}}">
                <td><a href="{{url('pengurus/mapel/lihat/'.$mapel->id)}}" class="btn btn-outline-success btn-sm">Lihat</a> <a href="{{url('pengurus/mapel/update/'.$mapel->id)}}" class="btn btn-outline-primary btn-sm">Update</a> 
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete </button>
                </td>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </div>

    <div class="tab-pane fade" id="tambah" role="tabpanel" aria-labelledby="profile-tab">
    <form method="POST" action="{{ route('mapel.tambah') }}">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="mapel" class="col-sm-4 col-form-label text-md-right">Mata Pelajaran</label>
            <div class="col-md-6">
                <input id="mapel" type="text" class="form-control{{ $errors->has('mapel') ? ' is-invalid' : '' }}" name="mapel" value="{{ old('mapel') }}" required autofocus>
                @if ($errors->has('mapel'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('mapel') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="deskripsi" class="col-sm-4 col-form-label text-md-right">Deskripsi</label>
            <div class="col-md-6">
                <input id="deskripsi" type="text" class="form-control{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}" name="deskripsi" value="{{ old('deskripsi') }}" required autofocus>
                @if ($errors->has('deskripsi'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('deskripsi') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="jenis_mapel" class="col-sm-4 col-form-label text-md-right">Jenis Mata Pelajaran</label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->has('jenis_latih') ? ' is-invalid' : '' }}" name="jenis_mapel">
                    <option value="">Pilih Jenis Mata Pelajaran</option>
                    <option value="Mata Pelajaran Wajib (Kelompok A)">Mata Pelajaran Wajib (Kelompok A)</option>
                    <option value="Mata Pelajaran Wajib (Kelompok B)">Mata Pelajaran Wajib (Kelompok B)</option>
                    <option value="A. Peminatan Matematika dan Sains">A. Peminatan Matematika dan Sains</option>
                    <option value="B. Peminatan Sosial">B. Peminatan Sosial</option>
                    <option value="C. Peminatan Bahasa">C. Peminatan Bahasa</option>
                    <option value="Pelajaran Utama">Pelajaran Utama</option>
                    <option value="Muatan Lokal">Muatan Lokal</option>
                </select>
            </div>
        </div>
            <div class="form-group row">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $('#example').DataTable();
</script>
@endsection
