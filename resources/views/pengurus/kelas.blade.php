@extends('pengurus.template-pengurus')

@section('content')

<div class="nav-scroller bg-white box-shadow">
   <ul class="nav nav-underline" id="myTab" role="tablist">
        <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Detail</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#tambah" role="tab" aria-controls="profile" aria-selected="false">Tambah</a>
        </li>
    </ul>
</div>

<br><br>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
<h1 class="h2">Kelas</h1>
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
    <li class="breadcrumb-item active" aria-current="page">Kelas</li>
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
<div class="table-responsive">
<table id="example" class="table table-hover table-sm" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Tahun Ajaran</th>
                <th>Nama Kelas</th>
                <th>Wali Kelas</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php $n=1;?>
        <tbody>
            @foreach($kelas as $kel)
            <tr>
                <td>{{$n++}}</td>
                <td>{{$kel->tahun_ajaran}}</td>
                <td>{{$kel->nama_kelas}}</td>
                <td>{{$kel->nama_lengkap}}</td>
                <form method="POST" action="{{url('pengurus/kelas/delete/'.$kel->id)}}">
                <td><a href="{{url('pengurus/kelas/lihat/'.$kel->id)}}" class="btn btn-outline-success btn-sm">Lihat</a> <a href="{{url('pengurus/kelas/update/'.$kel->id)}}" class="btn btn-outline-primary btn-sm">Update</a> 
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
        <div class="form-group row">
            <label for="id_ta" class="col-sm-4 col-form-label text-md-right">Tahun Ajaran</label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="id_ta">
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
                <input id="nama_kelas" type="text" class="form-control{{ $errors->has('nama_kelas') ? ' is-invalid' : '' }}" name="nama_kelas" value="{{ old('nama_kelas') }}" required autofocus>
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
                <select class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="id_guru">
                    <option value="" selected disabled>Pilih Wali Kelas</option>
                    @foreach($guru as $gr)
                    <option value="{{$gr->id}}">{{$gr->nama}}</option>
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
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $('#example').DataTable();
</script>
@endsection
