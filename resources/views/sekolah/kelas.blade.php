@extends('sekolah.template-sekolah')
@section('head')
<link href="{{asset('plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endsection
@section('content')

<div class="nav-scroller bg-white box-shadow">
   <ul class="nav nav-underline" id="myTab" role="tablist">
        <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tahun Ajaran {{$ta->tahun_ajaran}}</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#tambah" role="tab" aria-controls="profile" aria-selected="false">Tambah</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="jadwal-tab" href="{{url('sekolah/tahunajaran/id/'.$ta->id)}}" >Update Tahun Ajaran</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="jadwal-tab" href="{{url('sekolah/tahunajaran/siswadaftar/'.$ta->id)}}" >Siswa Daftar</a>
        </li>
        
    </ul>
</div>

<br><br>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
<h1 class="h2">Kelas Tahun Ajaran {{$ta->tahun_ajaran}}</h1>
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
    <li class="breadcrumb-item active" aria-current="page">Kurikulum</li>
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
            <tr><th>Tahun Ajaran</th><td>{{$ta->tahun_ajaran}}</td></tr>
            <tr><th>Tanggal Pendaftaran</th><td>{{$ta->tgl_pendaftaran}}</td></tr>
            <tr><th>Tanggal Test</th><td>{{$ta->tgl_test}}</td></tr>
            <tr><th>Tanggal Pengumuman</th><td>{{$ta->tgl_pengumuman}}</td></tr>
            <tr><th>Tanggal Daftar Ulang</th><td>{{$ta->tgl_daftar_ulang}}</td></tr>
        </table>
        </div>

        <div class="table-responsive-sm">
        <table id="example" class="table table-hover table-sm" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Jurusan</th>
                <th>Tingkat</th>
                <th>Kelas</th>
                <th>Wali Kelas</th>
                <th>Tanggal Dibuka</th>
                <th>Tanggal Ditutup</th>
                <th>Tanggal Arsip</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php $n=1;?>
        <tbody>
            @foreach($kelass as $kelas)
            <tr>
                <td>{{$n++}}</td>
                <?php 
                    $jurusan = App\Models\Jurusan::find($kelas->id_jurusan);
                    $tk = App\Models\Tingkat_kelas::find($kelas->id_tingkatan_kelas);
                ?>
                <td>{{(!empty($jurusan))? $jurusan->jurusan: ''}}</td>
                <td>{{(!empty($tk))? $tk->tingkat_kelas: ''}}</td>
                <td>{{$kelas->kelas}}</td>
                <td>{{$kelas->id_guru}}</td>
                <td>{{$kelas->tgl_buka}}</td>
                <td>{{$kelas->tgl_tutup}}</td>
                <td>{{$kelas->tgl_arsip}}</td>
                <td>{{$kelas->status}}</td>

                <form method="POST" action="{{url('sekolah/kurikulum/delete/'.$kelas->id)}}">
                <td><a href="{{url('sekolah/kelas/id/'.$kelas->id)}}" class="btn btn-outline-success btn-sm">Lihat</a> 
                    <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#exampleModalupdate"
                        data-kurikulum="{{$kelas->kurikulum}}" 
                        data-id="{{$kelas->id}}" 
                        >Update</button> 
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
    <form method="POST" action="{{ route('kelas.tambah') }}">
        {{ csrf_field() }}
        <input type="hidden" name="id_ta" value="{{$ta->id}}">
        <div class="form-group row">
            <label for="kelas" class="col-sm-4 col-form-label text-md-right">{{ __('Nama Kelas') }}</label>
            <div class="col-md-6">
                <input id="kelas" type="text" class="form-control{{ $errors->has('kelas') ? ' is-invalid' : '' }}" name="kelas" value="{{ old('kelas') }}" required autofocus>
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
                    <option selected disabled>Pilih Jenis Mata Pelajaran</option>
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
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="jurusan" class="col-sm-4 col-form-label text-md-right">{{ __('Tingkat Kelas') }}</label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->all() ? ' is-invalid' : '' }}" name="id_tingkatan_kelas" id="tingkatkelas">
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="id_guru" class="col-sm-4 col-form-label text-md-right">{{ __('Wali Kelas') }}</label>
            <div class="col-md-6">
                <input id="id_guru" type="text" class="form-control{{ $errors->has('id_guru') ? ' is-invalid' : '' }}" name="id_guru" value="{{ old('id_guru') }}" required autofocus>
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
                <textarea id="deskripsi" class="form-control{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}" name="deskripsi" value="" required autofocus>{{ old('deskripsi') }}</textarea>
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
                <input id="tgl_buka" type="date" class="form-control{{ $errors->has('tgl_buka') ? ' is-invalid' : '' }}" name="tgl_buka" value="{{ old('tgl_buka') }}" required autofocus>
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
                <input id="tgl_tutup" type="date" class="form-control{{ $errors->has('tgl_tutup') ? ' is-invalid' : '' }}" name="tgl_tutup" value="{{ old('tgl_tutup') }}" required autofocus>
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
                <input id="tgl_arsip" type="date" class="form-control{{ $errors->has('tgl_arsip') ? ' is-invalid' : '' }}" name="tgl_arsip" value="{{ old('tgl_arsip') }}" required autofocus>
                @if ($errors->has('tgl_arsip'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('tgl_arsip') }}</strong>
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