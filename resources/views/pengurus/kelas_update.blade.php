@extends('pengurus.template-pengurus')

@section('content')

<div class="nav-scroller bg-white box-shadow">
   <ul class="nav nav-underline" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link" href="{{url('/pengurus/kelas/lihat/'.$id)}}">{{$kelasid->nama_kelas}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{url('/pengurus/kelas/update/'.$id)}}">Update</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/pengurus/kelas/mapel/'.$id)}}">Tambah Mapel</a>
          </li>
    </ul>
</div>

<br><br>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
<h1 class="h2">Kelas {{$kelasid->nama_kelas}}</h1>
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
    <li class="breadcrumb-item"><a href="{{url('/pengurus/kelas')}}">Kelas</a></li>
    <li class="breadcrumb-item"><a href="{{url('/pengurus/kelas/lihat/'.$id)}}">{{$kelasid->nama_kelas}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Update</li>
  </ol>
</nav>


<div class="card">


<div class="card-body">

<form method="POST" action="{{ route('kelas.update') }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <input type="hidden" name="id_kelas" value="{{$id}}">
    <div class="form-group row">
        <label for="id_ta" class="col-sm-4 col-form-label text-md-right">Tahun Ajaran</label>
        <div class="col-md-6">
            <select class="custom-select {{ $errors->has('status') ? ' is-invalid' : '' }}" name="id_ta">
                <option value="{{$kelasid->id_ta}}" selected>{{$kelasid->tahun_ajaran}}</option>
                @foreach($ta as $ta)
                <option value="{{$ta->id}}">{{$ta->tahun_ajaran}}</option>
                @endforeach
            </select>
            @if ($errors->has('id_ta'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('id_ta') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="nama_kelas" class="col-sm-4 col-form-label text-md-right">Nama Kelas</label>
        <div class="col-md-6">
            <input id="nama_kelas" type="text" class="form-control{{ $errors->has('nama_kelas') ? ' is-invalid' : '' }}" name="nama_kelas" value="{{$kelasid->nama_kelas}}" required autofocus>
            @if ($errors->has('nama_kelas'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('nama_kelas') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="id_guru" class="col-sm-4 col-form-label text-md-right">Wali Kelas</label>
        <div class="col-md-6">
            <select class="custom-select {{ $errors->has('status') ? ' is-invalid' : '' }}" name="id_guru">
                @foreach($guru as $gr)
                <option value="{{$gr->id}}" {{($kelasid->id_guru == $gr->id)?'selected': ''}}>{{$gr->nama}}</option>
                @endforeach
            </select>
            @if ($errors->has('id_guru'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('id_guru') }}</strong>
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
