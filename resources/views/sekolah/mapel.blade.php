@extends('sekolah.template-sekolah')

@section('content')

<div class="nav-scroller bg-white box-shadow">
   <ul class="nav nav-underline" id="myTab" role="tablist">
        <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Mata Pelajaran</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#tambah" role="tab" aria-controls="profile" aria-selected="false">Tambah</a>
        </li>
    </ul>
</div>

<br><br>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
<h1 class="h2">Mata pelajaran</h1>
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
    <li class="breadcrumb-item active" aria-current="page"><a href="{{url('sekolah/kurikulum')}}">{{$tk->kurikulum}}</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{url('sekolah/jurusan/'.$tk->id_kurikulum)}}">{{$tk->jurusan}}</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{url('sekolah/tk/'.$tk->id_jurusan)}}">{{$tk->tingkat_kelas}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Mata Pelajaran</li>
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
                <th>Mata Pelajaran</th>
                <th>Deskripsi</th>
                <th>Jenis Mata Pelajaran</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php $n=1;?>
        <tbody>
            @foreach($mapels as $mapel)
            <tr>
                <td>{{$n++}}</td>
                <td>{{$mapel->mapel}}</td>
                <td>{{$mapel->deskripsi}}</td>
                <?php 
                    $jenis_mapel = App\Models\Jenis_mapel::find($mapel->id_jenis_mapel);
                ?>
                <td>{{(!empty($jenis_mapel))? $jenis_mapel->jenis_mapel : ''}}</td>
                <form method="POST" action="{{url('sekolah/mapel/delete/'.$mapel->id)}}">
                <td>
                    {{-- <a href="{{url('pengurus/mapel/lihat/'.$mapel->id)}}" class="btn btn-outline-success btn-sm">Lihat</a> --}}
                      <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#exampleModalupdate"
                                data-mapel="{{$mapel->mapel}}" 
                                data-deskripsi="{{$mapel->deskripsi}}" 
                                data-id_jenis_mapel="{{$mapel->id_jenis_mapel}}" 
                                data-id="{{$mapel->id}}"
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
    <form method="POST" action="{{ route('mapel.tambah') }}">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="mapel" class="col-sm-4 col-form-label text-md-right">Mata Pelajaran</label>
            <div class="col-md-6">
                <input id="mapel" type="text" class="form-control{{ $errors->has('mapel') ? ' is-invalid' : '' }}" name="mapel" value="{{ old('mapel') }}" required autofocus>
                @if ($errors->has('mapel'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('mapel') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="deskripsi" class="col-sm-4 col-form-label text-md-right">Deskripsi</label>
            <div class="col-md-6">
                <input id="deskripsi" type="text" class="form-control{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}" name="deskripsi" value="{{ old('deskripsi') }}" required autofocus>
                @if ($errors->has('deskripsi'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('deskripsi') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="id_jenis_mapel" class="col-sm-4 col-form-label text-md-right">Jenis Mata Pelajaran</label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->has('jenis_latih') ? ' is-invalid' : '' }}" name="id_jenis_mapel">
                    <option selected disabled>Pilih Jenis Mata Pelajaran</option>
                    @foreach($jps as $jp)
                    <option value="{{$jp->id}}">{{$jp->jenis_mapel}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <input type="hidden" name="id_tingkat_kelas" value="{{$id_tk}}">

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
      <form method="POST" action="{{ route('mapel.update') }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
      <input type="hidden" name="id" id="id">
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Mata Pelajaran</label>
            <input type="text" class="form-control" name="mapel" id="mapel">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Deskripsi</label>
            <input type="text" class="form-control" name="deskripsi" id="deskripsi">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Jenis Mapel (Abaikan jika tidak diperlukan)</label>
            <select class="form-control{{ $errors->has('jenis_latih') ? ' is-invalid' : '' }}" name="id_jenis_mapel">
                <option disabled>Pilih Jenis Mata Pelajaran</option>
                <option selected id="id_jenis_mapel">Rubah Jenis Mata Pelajaran</option>
                @foreach($jps as $jp)
                <option value="{{$jp->id}}">{{$jp->jenis_mapel}}</option>
                @endforeach
            </select>
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
    var mapel = button.data('mapel');
    var deskripsi = button.data('deskripsi');
    var id_jenis_mapel = button.data('id_jenis_mapel');
    var modal = $(this);
    console.log(id);
    modal.find('#mapel').val(mapel)
    modal.find('#deskripsi').val(deskripsi)
    modal.find('#id_jenis_mapel').val(id_jenis_mapel)
    modal.find('#id').val(id)
  })
</script>
@endsection
