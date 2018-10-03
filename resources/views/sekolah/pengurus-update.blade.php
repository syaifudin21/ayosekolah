@extends('sekolah.template-sekolah')

@section('content')

<div class="nav-scroller bg-white box-shadow">
   <ul class="nav nav-underline" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link" href="{{url('sekolah/pengurus/'.$id)}}">{{$pengurus->nama}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{url('sekolah/pengurus/update/'.$id)}}">Update</a>
        </li>
    </ul>
</div>

<br><br>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
<h1 class="h2"> Profil {{$pengurus->nama}}</h1>
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
    <li class="breadcrumb-item"><a href="{{url('sekolah/pengurus')}}">Pengurus</a></li>
    <li class="breadcrumb-item"><a href="{{url('sekolah/pengurus/'.$id)}}">Profil {{$pengurus->nama}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Update</li>
  </ol>
</nav>


     <form method="POST" action="{{route('sekolah.pengurus.update')}}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <input type="hidden" name="id" value="{{$id}}">
        <div class="form-group row">
            <label for="nama" class="col-sm-4 col-form-label text-md-right">Nama Pengurus</label>
            <div class="col-md-6">
                <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ $pengurus->nama }}" required autofocus>
                @if ($errors->has('nama'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('nama') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-4 col-form-label text-md-right">Email</label>
            <div class="col-md-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $pengurus->email }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="jenis_mapel" class="col-sm-4 col-form-label text-md-right">Authentication</label>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="status[]" id="artikel" value="123456" {{(preg_match("/123456/i", $pengurus->status))?'checked': ''}}>
                          <label class="form-check-label" for="artikel">
                            Artikel
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="status[]" id="pengumuman" value="211233" {{(preg_match("/211233/i", $pengurus->status))?'checked': ''}}>
                          <label class="form-check-label" for="pengumuman">
                            Pengumuman
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="status[]" id="album" value="981729" {{(preg_match("/981729/i", $pengurus->status))?'checked': ''}}>
                          <label class="form-check-label" for="album">
                            Album
                          </label>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="status[]" id="kelas" value="827980" {{(preg_match("/827980/i", $pengurus->status))?'checked': ''}}>
                          <label class="form-check-label" for="kelas">
                            Kelas
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="status[]" id="agenda" value="981987" {{(preg_match("/981987/i", $pengurus->status))?'checked': ''}}>
                          <label class="form-check-label" for="agenda">
                            Agenda
                          </label>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="status[]" id="prestasi" value="657842" {{(preg_match("/657842/i", $pengurus->status))?'checked': ''}}>
                          <label class="form-check-label" for="prestasi">
                            Prestasi
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="status[]" id="masukan" value="912879" {{(preg_match("/912879/i", $pengurus->status))?'checked': ''}}>
                          <label class="form-check-label" for="masukan">
                            Masukkan
                          </label>
                        </div>
                    </div>
                </div>
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
