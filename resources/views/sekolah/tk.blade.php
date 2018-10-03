@extends('sekolah.template-sekolah')
@section('head')
<link href="{{asset('plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endsection
@section('content')

<div class="nav-scroller bg-white box-shadow">
   <ul class="nav nav-underline" id="myTab" role="tablist">
        <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tingkat Kelas Jurusan {{$jurusan->jurusan}}</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#tambah" role="tab" aria-controls="profile" aria-selected="false">Tambah Tingkat Kelas</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#tambahjenis" role="tab" aria-controls="profile" aria-selected="false">Tambah Jenis Mata Pelajaran</a>
        </li>
    </ul>
</div>

<br><br>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
<h1 class="h2">Tinkatan Kelas Jurusan {{$jurusan->jurusan}}</h1>
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
    <li class="breadcrumb-item active" aria-current="page"><a href="{{url('sekolah/kurikulum')}}">{{$jurusan->kurikulum}}</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{url('sekolah/jurusan/'.$jurusan->id_kurikulum)}}">{{$jurusan->jurusan}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tingkatan Kelas</li>
  </ol>
</nav>

<div class="media">
  <a href="{{url('http://file.smawahasmodel.sch.id/standar/'.$jurusan->foto)}}"><img class="mr-3" src="{{url('http://file.smawahasmodel.sch.id/standar/'.$jurusan->foto)}}" alt="{{$jurusan->jurusan}}" width="128px"></a>
  <div class="media-body">
    <h5 class="mt-0">{{$jurusan->jurusan}}</h5>
    {!!$jurusan->deskripsi!!}
  </div>
</div>

<hr>

@if(Session::has('success'))
    <div class="alert alert-info alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ Session::get('success') }}
    </div>
@endif

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
       
       <div class="row">
           <div class="col-sm-12 col-md-6">
               <table id="example" class="table table-hover table-sm" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kelas</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php $n=1;?>
                <tbody>
                    @foreach($tks as $tk)
                    <tr>
                        <td>{{$n++}}</td>
                        <td>{{$tk->tingkat_kelas}}</td>
                        <form method="POST" action="{{url('sekolah/tk/delete/'.$tk->id)}}">
                        <td>
                            <a href="{{url('sekolah/mapel/'.$tk->id)}}" class="btn btn-outline-success btn-sm">Lihat</a>
                            <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#exampleModalupdate"
                                data-tingkat_kelas="{{$tk->tingkat_kelas}}" 
                                data-id="{{$tk->id}}" 
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
           <div class="col-sm-12 col-md-6">
                <table id="example" class="table table-hover table-sm" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Jenis Mata Pelajaran</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php $n=1;?>
                    <tbody>
                        @foreach($jps as $jp)
                        <tr>
                            <td>{{$n++}}</td>
                            <td><b>{{$jp->jenis_mapel}}</b></td>
                            <form method="POST" action="{{url('sekolah/jenismapel/delete/'.$jp->id)}}">
                            <td>
                                <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#exampleModalupdatejm"
                                    data-jenis_mapel="{{$jp->jenis_mapel}}" 
                                    data-id="{{$jp->id}}" 
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
         

    </div>

    <div class="tab-pane fade" id="tambah" role="tabpanel" aria-labelledby="profile-tab">
    <form method="POST" action="{{ route('tk.tambah') }}">
        {{ csrf_field() }}
        <input type="hidden" name="id_jurusan" value="{{$id_jurusan}}">
        <div class="form-group row">
            <label for="tingkat_kelas" class="col-sm-4 col-form-label text-md-right">{{ __('Tingkatan Kelas') }}</label>
            <div class="col-md-6">
                <input id="tingkat_kelas" type="text" class="form-control{{ $errors->has('tingkat_kelas') ? ' is-invalid' : '' }}" name="tingkat_kelas" value="{{ old('tingkat_kelas') }}" required autofocus>
                @if ($errors->has('tingkat_kelas'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('tingkat_kelas') }}</strong>
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
     <div class="tab-pane fade" id="tambahjenis" role="tabpanel" aria-labelledby="profile-tab">
    <form method="POST" action="{{ route('jenismapel.tambah') }}">
        {{ csrf_field() }}
        <input type="hidden" name="id_jurusan" value="{{$id_jurusan}}">
        <div class="form-group row">
            <label for="jenis_mapel" class="col-sm-4 col-form-label text-md-right">{{ __('Jenis Mata Pelajaran') }}</label>
            <div class="col-md-6">
                <input id="jenis_mapel" type="text" class="form-control{{ $errors->has('jenis_mapel') ? ' is-invalid' : '' }}" name="jenis_mapel" value="{{ old('jenis_mapel') }}" required autofocus>
                @if ($errors->has('jenis_mapel'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('jenis_mapel') }}</strong>
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


<div class="modal fade" id="exampleModalupdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Foto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('tk.update') }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
      <input type="hidden" name="id" id="id">
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tingkat Kelas</label>
            <input type="text" class="form-control" name="tingkat_kelas" id="tingkat_kelas">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModalupdatejm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Foto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('jenismapel.update') }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
      <input type="hidden" name="id" id="id">
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tingkat Kelas</label>
            <input type="text" class="form-control" name="jenis_mapel" id="jenis_mapel">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
  $('#exampleModalupdate').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var tingkat_kelas = button.data('tingkat_kelas');
    var modal = $(this);
    console.log(id);
    modal.find('#tingkat_kelas').val(tingkat_kelas)
    modal.find('#id').val(id)
  })
  $('#exampleModalupdatejm').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var jenis_mapel = button.data('jenis_mapel');
    var modal = $(this);
    console.log(id);
    modal.find('#jenis_mapel').val(jenis_mapel)
    modal.find('#id').val(id)
  })
</script>
@endsection