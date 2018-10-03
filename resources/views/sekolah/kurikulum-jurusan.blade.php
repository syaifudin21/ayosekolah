@extends('sekolah.template-sekolah')
@section('head')
<link href="{{asset('plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endsection
@section('content')

<div class="nav-scroller bg-white box-shadow">
   <ul class="nav nav-underline" id="myTab" role="tablist">
        <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Jurusan</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#tambah" role="tab" aria-controls="profile" aria-selected="false">Tambah</a>
        </li>
    </ul>
</div>

<br><br>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
<h1 class="h2">{{$kurikulum->kurikulum}}</h1>
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
    <li class="breadcrumb-item active" aria-current="page"><a href="{{url('sekolah/kurikulum')}}">{{$kurikulum->kurikulum}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Jurusan</li>
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
       
         <table id="example" class="table table-hover table-sm" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Jurusan</th>
                        <th>Kelas</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php $n=1;?>
                <tbody>
                    @foreach($jurusans as $jurusan)
                    <tr>
                        <?php
                            $kelas = App\Models\Tingkat_kelas::where('id_jurusan', $jurusan->id)->get(); 
                        ?>
                        <td>{{$n++}}</td>
                        <td><b>{{$jurusan->jurusan}}</b></td>
                        <td>{{count($kelas)}}</td>
                        <form method="POST" action="{{url('sekolah/tk/delete/'.$jurusan->id)}}">
                        <td>
                            <a href="{{url('sekolah/tk/'.$jurusan->id)}}" class="btn btn-outline-success btn-sm">Lihat</a> 
                             <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#exampleModalupdate"
                                data-jurusan="{{$jurusan->jurusan}}" 
                                data-deskripsi="{{$jurusan->deskripsi}}" 
                                data-id="{{$jurusan->id}}" 
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

    <div class="tab-pane fade" id="tambah" role="tabpanel" aria-labelledby="profile-tab">
    <form method="POST" action="{{ route('jurusan.tambah') }}"  enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="id_kurikulum" value="{{$kurikulum->id}}">
        <div class="form-group row">
            <label for="jurusan" class="col-sm-4 col-form-label text-md-right">{{ __('Jurusan') }}</label>
            <div class="col-md-6">
                <input id="jurusan" type="text" class="form-control{{ $errors->has('jurusan') ? ' is-invalid' : '' }}" name="jurusan" value="{{ old('jurusan') }}" required autofocus>
                @if ($errors->has('jurusan'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('jurusan') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="deskripsi" class="col-sm-4 col-form-label text-md-right">{{ __('Deskrispi') }}</label>
            <div class="col-md-6">
                <textarea id="deskripsi" type="text" class="form-control{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}" name="deskripsi" required autofocus>{{ old('deskripsi') }}</textarea>
                @if ($errors->has('deskripsi'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('deskripsi') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="foto" class="col-sm-4 col-form-label text-md-right">{{ __('Foto') }}</label>
            <div class="col-md-6">
                <input id="foto" type="file" class="form-control{{ $errors->has('foto') ? ' is-invalid' : '' }}" name="foto" value="{{ old('foto') }}" required autofocus>
                @if ($errors->has('foto'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('foto') }}</strong>
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
      <form method="POST" action="{{ route('jurusan.update') }}"  enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
      <input type="hidden" name="id" id="id">
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Jurusan</label>
            <input type="text" class="form-control" name="jurusan" id="jurusan">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Deskripsi</label>
            <input type="text" class="form-control" name="deskripsi" id="deskripsi">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Foto</label>
            <input type="file" class="form-control" name="foto">
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
    var jurusan = button.data('jurusan');
    var deskripsi = button.data('deskripsi');
    var modal = $(this);
    console.log(id);
    modal.find('#jurusan').val(jurusan)
    modal.find('#id').val(id)
    modal.find('#deskripsi').val(deskripsi)
  })
</script>
@endsection