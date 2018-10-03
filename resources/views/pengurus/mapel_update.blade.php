@extends('pengurus.template-pengurus')

@section('content')

<div class="nav-scroller bg-white box-shadow">
   <ul class="nav nav-underline" id="myTab" role="tablist">
        <li class="nav-item">
        <a class="nav-link" href="{{url('/pengurus/mapel/lihat/'.$id)}}">{{$mapelid->mapel}}</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" href="{{url('/pengurus/mapel/update/'.$id)}}">Update</a>
        </li>
    </ul>
</div>

<br><br>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
<h1 class="h2">Update Mata Pelajaran {{$mapelid->mapel}}</h1>
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
    <li class="breadcrumb-item"><a href="{{url('pengurus/mapel')}}">Mata Pelajaran</a></li>
    <li class="breadcrumb-item"><a href="{{url('pengurus/mapel/lihat/'.$id)}}">{{$mapelid->mapel}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Update</li>
  </ol>
</nav>

<div class="card">

<div class="card-body">
    <form method="POST" action="{{ route('mapel.update') }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <input type="hidden" name="id_mapel" value="{{$id}}">
        <div class="form-group row">
            <label for="mapel" class="col-sm-4 col-form-label text-md-right">Mata Pelajaran</label>
            <div class="col-md-6">
                <input id="mapel" type="text" class="form-control{{ $errors->has('mapel') ? ' is-invalid' : '' }}" name="mapel" value="{{$mapelid->mapel}}" required autofocus>
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
                <input id="deskripsi" type="text" class="form-control{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}" name="deskripsi" value="{{$mapelid->deskripsi}}" required autofocus>
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
                    <option value="" disabled>Pilih Jenis Mata Pelajaran</option>
                    <option value="Mata Pelajaran Wajib (Kelompok A)" {{($mapelid->jenis_mapel == 'Mata Pelajaran Wajib (Kelompok A)')? 'selected': ''}} >Mata Pelajaran Wajib (Kelompok A)</option>
                    <option value="Mata Pelajaran Wajib (Kelompok B)" {{($mapelid->jenis_mapel == 'Mata Pelajaran Wajib (Kelompok B)')? 'selected': ''}}>Mata Pelajaran Wajib (Kelompok B)</option>
                    <option value="A. Peminatan Matematika dan Sains" {{($mapelid->jenis_mapel == 'A. Peminatan Matematika dan Sains')? 'selected': ''}}>A. Peminatan Matematika dan Sains</option>
                    <option value="B. Peminatan Sosial" {{($mapelid->jenis_mapel == 'B. Peminatan Sosial')? 'selected': ''}}>B. Peminatan Sosial</option>
                    <option value="C. Peminatan Bahasa" {{($mapelid->jenis_mapel == 'C. Peminatan Bahasa')? 'selected': ''}}>C. Peminatan Bahasa</option>
                    <option value="Pelajaran Utama" {{($mapelid->jenis_mapel == 'Pelajaran Utama')? 'selected': ''}}>Pelajaran Utama</option>
                    <option value="Muatan Lokal" {{($mapelid->jenis_mapel == 'Muatan Lokal')? 'selected': ''}}>Muatan Lokal</option>
                </select>
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
