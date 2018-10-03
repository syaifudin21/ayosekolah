@extends($template)

@section('content')

<div class="nav-scroller bg-white box-shadow">
   <ul class="nav nav-underline" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" href="">{{$agenda->agenda}} Update</a>
        </li>
    </ul>
</div>

<br><br>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
<h1 class="h2">Agenda {{$agenda->agenda}}</h1>
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
    <li class="breadcrumb-item"><a href="{{url(strtolower($auth).'/'.$menu.'/agenda')}}">Pengumuman</a></li>
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

    <form method="POST" action="{{ route('agenda.update') }}">
        @method('PUT')
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <input type="hidden" name="id" value="{{$agenda->id}}">
        <div class="form-group row">
            <label for="agenda" class="col-sm-4 col-form-label text-md-right">Nama Agenda</label>
            <div class="col-md-6">
                <input id="agenda" type="text" class="form-control{{ $errors->has('agenda') ? ' is-invalid' : '' }}" name="agenda" value="{{ $agenda->agenda }}" required autofocus>
                @if ($errors->has('agenda'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('agenda') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="keterangan" class="col-sm-4 col-form-label text-md-right">Keterangan</label>
            <div class="col-md-6">
                <textarea id="keterangan" class="form-control{{ $errors->has('keterangan') ? ' is-invalid' : '' }}" name="keterangan" required autofocus>{{ $agenda->keterangan }}</textarea>
                @if ($errors->has('keterangan'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('keterangan') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="waktu" class="col-sm-4 col-form-label text-md-right">Waktu Mulai</label>
            <div class="col-md-6">
                <input id="waktu" type="date" class="form-control{{ $errors->has('waktu') ? ' is-invalid' : '' }}" name="waktu" value="{{ $agenda->waktu }}" required autofocus>
                @if ($errors->has('waktu'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('waktu') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        @if($auth == 'Pengurus')
        <div class="form-group row">
            <label for="status_tampil" class="col-sm-4 col-form-label text-md-right">Status Tampil</label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->has('status_tampil') ? ' is-invalid' : '' }}" name="status_tampil">
                    <option value="" disabled selected >Pilih Status Tampil</option>
                    <option value="Tampil" {{($agenda->status_tampil =='Tampil')? 'selected' : ''}}>Tampil</option>
                    <option value="Sembunyikan" {{($agenda->status_tampil =='Sembunyikan')? 'selected' : ''}}>Sembunyikan</option>
                </select>
                @if ($errors->has('status_tampil'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('status_tampil') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="status" class="col-sm-4 col-form-label text-md-right">Status</label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status">
                    <option value="" disabled >Pilih Status Tampil</option>
                    <option value="Terlaksana" {{($agenda->status =='Terlaksana')? 'selected' : ''}}>Terlaksana</option>
                    <option value="Setujui" {{($agenda->status =='Setujui')? 'selected' : ''}}>Setujui</option>
                    <option value="Batal" {{($agenda->status =='Batal')? 'selected' : ''}}>Batal</option>
                    <option value="Rencana" {{($agenda->status =='Rencana')? 'selected' : 'selected'}}>Rencana</option>
                </select>
                @if ($errors->has('status'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('status') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="status_public" class="col-sm-4 col-form-label text-md-right">Status Public</label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->has('status_public') ? ' is-invalid' : '' }}" name="status_public">
                    <option value="" disabled >Pilih Status Tampil</option>
                    <option value="Public" {{($agenda->status_public =='Public')? 'selected' : 'selected'}}>Public</option>
                    <option value="Organisasi" {{($agenda->status_public =='Organisasi')? 'selected' : ''}}>Organisasi</option>
                    <option value="Kelas" {{($agenda->status_public =='Kelas')? 'selected' : ''}}>Kelas</option>
                    <option value="Guru" {{($agenda->status_public =='Guru')? 'selected' : ''}}>Guru</option>
                    <option value="Siswa" {{($agenda->status_public =='Siswa')? 'selected' : ''}}>Siswa</option>
                </select>
                @if ($errors->has('status_public'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('status_public') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        @endif


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
