@extends('pengurus.template-pengurus')
@section('head')
<link href="{{asset('plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endsection
@section('content')

<div class="nav-scroller bg-white box-shadow">
   <ul class="nav nav-underline" id="myTab" role="tablist">
        <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Prestasi</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#tambah" role="tab" aria-controls="profile" aria-selected="false">Tambah</a>
        </li>
    </ul>
</div>

<br><br>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
<h1 class="h2">Prestasi</h1>
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
    <li class="breadcrumb-item active" aria-current="page">Prestasi</li>
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
                        <th>tanggal</th>
                        <th>Prestasi</th>
                        <th>Foto</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php $n=1;?>
                <tbody>
                    @foreach($prestasis as $prestasi)
                    <tr>
                        <td>{{$n++}}</td>
                        <td>{{$prestasi->tanggal}}</td>
                        <td><b>{{$prestasi->nama}}</b><p>{!! $prestasi->deskripsi!!}</p></td>
                        <td>{{$prestasi->foto}}</td>
                        <form method="POST" action="{{url('pengurus/prestasi/'.$prestasi->id)}}">
                        <td><a href="{{url('pengurus/prestasi/'.$prestasi->id)}}" class="btn btn-outline-success btn-sm">Lihat</a> <a href="{{url('pengurus/prestasi/edit/'.$prestasi->id)}}" class="btn btn-outline-primary btn-sm">Update</a> 
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
    <form method="POST" action="{{route('prestasi.tambah')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="nama" class="col-sm-4 col-form-label text-md-right">Prestasi</label>
            <div class="col-md-6">
                <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" required autofocus>
                @if ($errors->has('nama'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('nama') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="instalasi" class="col-sm-4 col-form-label text-md-right">Instalasi</label>
            <div class="col-md-6">
                <input id="instalasi" type="text" class="form-control{{ $errors->has('instalasi') ? ' is-invalid' : '' }}" name="instalasi" value="{{ old('instalasi') }}" required autofocus>
                @if ($errors->has('instalasi'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('instalasi') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="deskripsi" class="col-sm-4 col-form-label text-md-right">Deskripsi</label>
            <div class="col-md-6">
                <textarea id="deskripsi" class="form-control{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}" name="deskripsi" required autofocus>{{ old('deskripsi') }}</textarea>
                @if ($errors->has('deskripsi'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('deskripsi') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="deskripsi" class="col-sm-4 col-form-label text-md-right">Foto</label>
            <div class="col-md-6">
                <input id="foto" type="file" class="form-control{{ $errors->has('foto') ? ' is-invalid' : '' }}" name="foto" value="{{ old('foto') }}" required autofocus>

                @if ($errors->has('foto'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('foto') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="foto" class="col-sm-4 col-form-label text-md-right">Tanggal</label>
            <div class="col-md-6">
            <input type="date" class="form-control" name="tanggal" class="form-control{{ $errors->has('foto') ? ' is-invalid' : '' }}" value="{{ old('tanggal') }}">
                
                @if ($errors->has('tanggal'))
                    <span class="wak-feedback">
                        <strong>{{ $errors->first('tanggal') }}</strong>
                    </span>
                @endif
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
@endsection
