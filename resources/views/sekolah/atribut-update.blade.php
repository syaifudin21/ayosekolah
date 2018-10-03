@extends('sekolah.template-sekolah')

@section('content')

<div class="nav-scroller bg-white box-shadow">
   <ul class="nav nav-underline" id="myTab" role="tablist">
        <li class="nav-item">
        <a class="nav-link" href="{{url('/sekolah/atribut/lihat/'.$id)}}">{{$atribut->atribut}}</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" href="{{url('/sekolah/atribut/update/'.$id)}}">Update</a>
        </li>
    </ul>
</div>

<br><br>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
<h1 class="h2">Update Atribut {{$atribut->atribut}}</h1>
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
    <li class="breadcrumb-item"><a href="{{url('sekolah/atribut')}}">Atribut</a></li>
    <li class="breadcrumb-item"><a href="{{url('sekolah/atribut/'.$id)}}">{{$atribut->atribut}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Update</li>
  </ol>
</nav>

    <form method="POST" action="{{ route('atribut.update') }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <input type="hidden" name="id" value="{{$id}}">
        <div class="form-group row">
            <label for="nama" class="col-sm-4 col-form-label text-md-right">Atribut</label>
            <div class="col-md-6">
                <input id="nama" type="text" class="form-control{{ $errors->has('atribut') ? ' is-invalid' : '' }}" name="atribut" value="{{ $atribut->atribut }}" required autofocus>
                @if ($errors->has('atribut'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('atribut') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="deskripsi" class="col-sm-4 col-form-label text-md-right">Deskripsi</label>
            <div class="col-md-6">
                <textarea id="deskripsi" class="form-control{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}" name="deskripsi" required autofocus>{{ $atribut->deskripsi }}</textarea>
                @if ($errors->has('deskripsi'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('deskripsi') }}</strong>
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

@endsection

@section('script')
@endsection
