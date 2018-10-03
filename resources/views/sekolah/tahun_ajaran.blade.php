@extends('sekolah.template-sekolah')
@section('head')
<link href="{{asset('plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endsection
@section('content')

<div class="nav-scroller bg-white box-shadow">
   <ul class="nav nav-underline" id="myTab" role="tablist">
        <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tahun Ajaran</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#tambah" role="tab" aria-controls="profile" aria-selected="false">Tambah</a>
        </li>
    </ul>
</div>

<br><br>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
<h1 class="h2">Tahun Ajaran</h1>
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
    <li class="breadcrumb-item active" aria-current="page">Tahun Ajaran</li>
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
                <th>Tahun Ajaran</th>
                <th>Tgl Pendaftaran</th>
                <th>Tgl Test</th>
                <th>Tgl Pengumuman</th>
                <th>Tgl Daftar Ulang</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php $n=1;?>
        <tbody>
            @foreach($ta as $ta)
            <tr>
                <td>{{$n++}}</td>
                <td>{{$ta->tahun_ajaran}} 
                    <br>{!!(!empty($ta->brosur))? '<a href=http://file.smawahasmodel.sch.id/standar/'.$ta->brosur.'>Brosur</a>' :''!!}
                    <br>{!!(!empty($ta->jadwal))? '<a href=http://file.smawahasmodel.sch.id/standar/'.$ta->jadwal.'>Jadwal</a>' :''!!}

                </td>

                <td>{{$ta->tgl_pendaftaran}}</td>
                <td>{{$ta->tgl_test}}</td>
                <td>{{$ta->tgl_pengumuman}}</td>
                <td>{{$ta->tgl_daftar_ulang}}</td>
                <td>{{$ta->status}}</td>
                <td><a href="{{url('sekolah/kelas/'.$ta->id)}}" class="btn btn-outline-primary btn-sm">Lihat</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
        </div>
    </div>

    <div class="tab-pane fade" id="tambah" role="tabpanel" aria-labelledby="profile-tab">
    <form method="POST" action="{{ route('tahunajaran.tambah') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="tahun_ajaran" class="col-sm-4 col-form-label text-md-right">{{ __('Tahun Ajaran') }}</label>
            <div class="col-md-6">
                <input id="tahun_ajaran" type="text" class="form-control{{ $errors->has('tahun_ajaran') ? ' is-invalid' : '' }}" name="tahun_ajaran" value="{{ old('tahun_ajaran') }}" required autofocus>
                @if ($errors->has('tahun_ajaran'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('tahun_ajaran') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="tgl_pendaftaran" class="col-sm-4 col-form-label text-md-right">{{ __('Tanggal Pendaftaran') }}</label>
            <div class="col-md-6">
                <input id="tgl_pendaftaran" type="date" class="form-control{{ $errors->has('tgl_pendaftaran') ? ' is-invalid' : '' }}" name="tgl_pendaftaran" value="{{ old('tgl_pendaftaran') }}" required autofocus>
                @if ($errors->has('tgl_pendaftaran'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('tgl_pendaftaran') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="tgl_test" class="col-sm-4 col-form-label text-md-right">{{ __('Tanggal Test') }}</label>
            <div class="col-md-6">
                <input id="tgl_test" type="date" class="form-control{{ $errors->has('tgl_test') ? ' is-invalid' : '' }}" name="tgl_test" value="{{ old('tgl_test') }}" required autofocus>
                @if ($errors->has('tgl_test'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('tgl_test') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="tgl_pengumuman" class="col-sm-4 col-form-label text-md-right">{{ __('Tanggal Pengumuman') }}</label>
            <div class="col-md-6">
                <input id="tgl_pengumuman" type="date" class="form-control{{ $errors->has('tgl_pengumuman') ? ' is-invalid' : '' }}" name="tgl_pengumuman" value="{{ old('tgl_pengumuman') }}" required autofocus>
                @if ($errors->has('tgl_pengumuman'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('tgl_pengumuman') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="tgl_daftar_ulang" class="col-sm-4 col-form-label text-md-right">{{ __('Tanggal Daftar Ulang') }}</label>
            <div class="col-md-6">
                <input id="tgl_daftar_ulang" type="date" class="form-control{{ $errors->has('tgl_daftar_ulang') ? ' is-invalid' : '' }}" name="tgl_daftar_ulang" value="{{ old('tgl_daftar_ulang') }}" required autofocus>
                @if ($errors->has('tgl_daftar_ulang'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('tgl_daftar_ulang') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="jadwal" class="col-sm-4 col-form-label text-md-right">{{ __('Jadwal') }}</label>
            <div class="col-md-6">
                <input id="jadwal" type="file" class="form-control{{ $errors->has('jadwal') ? ' is-invalid' : '' }}" name="jadwal" value="{{ old('jadwal') }}" required autofocus>
                @if ($errors->has('jadwal'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('jadwal') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="brosur" class="col-sm-4 col-form-label text-md-right">{{ __('Brosur') }}</label>
            <div class="col-md-6">
                <input id="brosur" type="file" class="form-control{{ $errors->has('brosur') ? ' is-invalid' : '' }}" name="brosur" value="{{ old('brosur') }}" required autofocus>
                @if ($errors->has('brosur'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('brosur') }}</strong>
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