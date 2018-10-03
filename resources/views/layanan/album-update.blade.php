@extends($template)

@section('content')

<div class="nav-scroller bg-white box-shadow">
   <ul class="nav nav-underline" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" href="{{url($auth.'/album/'.$id)}}">{{$album->nama}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url($auth.'/album/edit/'.$id)}}">Update</a>
        </li>
    </ul>
</div>

<br><br>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
<h1 class="h2"> Album {{$album->nama}}</h1>
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
    <li class="breadcrumb-item"><a href="{{url($auth.'/album')}}">Album</a></li>
    <li class="breadcrumb-item"><a href="{{url($auth.'/album/'.$id)}}">{{$album->nama}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Update</li>
  </ol>
</nav>

@if(Session::has('success'))
  <div class="alert alert-info alert-dismissable">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      {{ Session::get('success') }}
  </div>
@endif

<div class="card">

<div class="card-body">
    <form method="POST" action="{{ route('album.update') }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <input type="hidden" name="id" value="{{$id}}">
        <div class="form-group row">
            <label for="nama" class="col-sm-4 col-form-label text-md-right">Nama Album</label>
            <div class="col-md-6">
                <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{$album->nama}}" required autofocus>
                @if ($errors->has('nama'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('nama') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="deskripsi" class="col-sm-4 col-form-label text-md-right">Deskripsi</label>
            <div class="col-md-6">
                <textarea id="deskripsi" class="form-control{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}" name="deskripsi" required autofocus>{{$album->deskripsi}}</textarea>
                @if ($errors->has('deskripsi'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('deskripsi') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="tgl_kegiatan" class="col-sm-4 col-form-label text-md-right">Tanggal Album</label>
            <div class="col-md-6">
                <input id="tgl_kegiatan" type="date" class="form-control{{ $errors->has('tgl_kegiatan') ? ' is-invalid' : '' }}" name="tgl_kegiatan" value="{{$album->tgl_kegiatan}}" required autofocus>
                @if ($errors->has('tgl_kegiatan'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('tgl_kegiatan') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        
            <div class="form-group row">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>

</div>
</div>
@endsection

@section('script')

@endsection
