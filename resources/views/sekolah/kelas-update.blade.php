@extends('sekolah.template-sekolah')

@section('content')

<div class="nav-scroller bg-white box-shadow">
   <ul class="nav nav-underline" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" href="{{url('sekolah/kelas/id/'.$kelas->id)}}">{{$kelas->kelas}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="">Update</a>
        </li>
    </ul>
</div>

<br><br>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
<h1 class="h2"> Kelas {{$kelas->kelas}}</h1>
<div class="btn-toolbar mb-2 mb-md-0">
  <div class="btn-group mr-2">
    <button class="btn btn-sm btn-outline-secondary">Update</button>
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
    <li class="breadcrumb-item"><a href="{{url('sekolah/kelas/'.$kelas->id_ta)}}">Tahun Ajaran {{$kelas->tahun_ajaran}}</a></li>
    <li class="breadcrumb-item"><a href="{{url('sekolah/kelas/id/'.$kelas->id)}}">{{$kelas->kelas}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Update</li>
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

<form method="POST" action="{{ route('kelas.update') }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <input type="hidden" name="id" value="{{$kelas->id}}">
        <div class="form-group row">
            <label for="kelas" class="col-sm-4 col-form-label text-md-right">{{ __('Nama Kelas') }}</label>
            <div class="col-md-6">
                <input id="kelas" type="text" class="form-control{{ $errors->has('kelas') ? ' is-invalid' : '' }}" name="kelas" value="{{ $kelas->kelas }}" required autofocus>
                @if ($errors->has('kelas'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('kelas') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="kurikulum" class="col-sm-4 col-form-label text-md-right">{{ __('Nama Kurikulum') }}</label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->all() ? ' is-invalid' : '' }}" name="kurikulum" id="kurikulum">
                    <option selected>Pilih Kurikulum</option>
                    <option value="{{$kelas->id_kurikulum}}" selected> {{$kelas->kurikulum}}</option>
                    @foreach($kurikulums as $kurikulum)
                    <option value="{{$kurikulum->id}}">{{$kurikulum->kurikulum}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="jurusan" class="col-sm-4 col-form-label text-md-right">{{ __('Jurusan') }}</label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->all() ? ' is-invalid' : '' }}" name="id_jurusan" id="jurusan">
                    <option value="{{$kelas->id_jurusan}}" selected>{{$kelas->jurusan}}</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="jurusan" class="col-sm-4 col-form-label text-md-right">{{ __('Tingkat Kelas') }}</label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->all() ? ' is-invalid' : '' }}" name="id_tingkatan_kelas" id="tingkatkelas">
                    <option value="{{$kelas->id_tingkatan_kelas}}" selected>{{$kelas->tingkat_kelas}}</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="id_guru" class="col-sm-4 col-form-label text-md-right">{{ __('Wali Kelas') }}</label>
            <div class="col-md-6">
                <input id="id_guru" type="text" class="form-control{{ $errors->has('id_guru') ? ' is-invalid' : '' }}" name="id_guru" value="{{$kelas->id_guru}}" required autofocus>
                @if ($errors->has('id_guru'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('id_guru') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="deskripsi" class="col-sm-4 col-form-label text-md-right">{{ __('Deskripsi Kelas') }}</label>
            <div class="col-md-6">
                <textarea id="deskripsi" rows="9" class="form-control{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}" name="deskripsi" value="" required autofocus>{{$kelas->deskripsi}}</textarea>
                @if ($errors->has('deskripsi'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('deskripsi') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="tgl_buka" class="col-sm-4 col-form-label text-md-right">{{ __('Tanggal Dibuka') }}</label>
            <div class="col-md-6">
                <input id="tgl_buka" type="date" class="form-control{{ $errors->has('tgl_buka') ? ' is-invalid' : '' }}" name="tgl_buka" value="{{$kelas->tgl_buka}}" autofocus>
                @if ($errors->has('tgl_buka'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('tgl_buka') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="tgl_tutup" class="col-sm-4 col-form-label text-md-right">{{ __('Tanggal Ditutup') }}</label>
            <div class="col-md-6">
                <input id="tgl_tutup" type="date" class="form-control{{ $errors->has('tgl_tutup') ? ' is-invalid' : '' }}" name="tgl_tutup" value="{{$kelas->tgl_tutup}}" autofocus>
                @if ($errors->has('tgl_tutup'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('tgl_tutup') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="tgl_arsip" class="col-sm-4 col-form-label text-md-right">{{ __('Tanggal Arsip') }}</label>
            <div class="col-md-6">
                <input id="tgl_arsip" type="date" class="form-control{{ $errors->has('tgl_arsip') ? ' is-invalid' : '' }}" name="tgl_arsip" value="{{$kelas->tgl_arsip}}" autofocus>
                @if ($errors->has('tgl_arsip'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('tgl_arsip') }}</strong>
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

</div>

@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function(){
        $('#kurikulum').on('change', function(e){
            var id = e.target.value;
            $.get('{{ url('data/kurikulum')}}/'+id, function(data){
            console.log(data);
                $('#tingkatkelas').empty();
                $('#jurusan').empty();
                $('#jurusan').append("<option disabled selected> Pilih Jurusan</option>");
                $.each(data['jurusans'], function(index, element){
                    $('#jurusan').append("<option value=" +element.id+ ">" + element.jurusan + "</option>");
                });
            });
        });
        $('#jurusan').on('change', function(e){
            var id = e.target.value;
            $.get('{{ url('data/jurusan')}}/'+id, function(data){
            console.log(data);
                $('#tingkatkelas').empty();
                $('#tingkatkelas').append("<option disabled selected>Pilih Tingkat Kelas</option>");
                $.each(data['tks'], function(index, element){
                    $('#tingkatkelas').append("<option value=" +element.id+ ">" + element.tingkat_kelas + "</option>");
                });
            });
        });
    });
</script>
@endsection
