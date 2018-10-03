@extends($template)

@section('head')
<link href="{{asset('plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endsection
@section('content')

<div class="nav-scroller bg-white box-shadow">
   <ul class="nav nav-underline" id="myTab" role="tablist">
        <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Album</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#tambah" role="tab" aria-controls="profile" aria-selected="false">Tambah</a>
        </li>
    </ul>
</div>

<br><br>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
<h1 class="h2">Album</h1>
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
                    <th>Nama Album</th>
                    <th>Deskripsi</th>
                    <th>Tgl Kegiatan</th>
                    <th>P / D</th>
                    <th>Auth - id</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php $n=1;?>
            <tbody>
                @foreach($albums as $album)
                <tr>
                    <?php 
                        if ($album->status_user == 'pengurus') {
                            $dd = App\Models\Pengurus::find($album->id_user);
                                $nama = (!empty($dd))? $dd->nama : 'NN';
                        }elseif ($album->status_user == 'guru') {
                            $dd = App\Models\Pengajars::find($album->id_user);
                                $nama = (!empty($dd))? $dd->nama : 'NN';
                        }elseif ($album->status_user == 'siswa') {
                            $dd = App\Models\Siswas::find($album->id_user);
                                $nama = (!empty($dd))? $dd->nama : 'NN';
                        }else{
                            $nama = 'NN';
                        }
                    ?>
                    <td>{{$n++}}</td>
                    <td>{{$album->nama}}</td>
                    <td>{{$album->deskripsi}}</td>
                    <td>{{$album->tgl_kegiatan}}</td>
                    <td>{{$album->id_prestasi}}</td>
                    <td>{{$album->status_user}} - {{$nama}}</td>
                    <td>
                        <a href="{{url($auth.'/album',$album->id)}}" class="btn btn-outline-success btn-sm">Lihat</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>

    <div class="tab-pane fade" id="tambah" role="tabpanel" aria-labelledby="profile-tab">
    <form method="POST" action="{{route('album.tambah')}}">
        {{ csrf_field() }}
        <input type="hidden" name="status_user" value="{{$auth}}">
        <input type="hidden" name="id_user" value="{{$id_auth}}">
        <div class="form-group row">
            <label for="nama" class="col-sm-4 col-form-label text-md-right">Nama Album</label>
            <div class="col-md-6">
                <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" required autofocus>
                @if ($errors->has('nama'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('nama') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="deskripsi" class="col-sm-4 col-form-label text-md-right">Deskripsi</label>
            <div class="col-md-6">
                <textarea id="deskripsi" class="form-control{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}" name="deskripsi" required autofocus>{{ old('deskripsi') }}</textarea>
                @if ($errors->has('deskripsi'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('deskripsi') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="tgl_kegiatan" class="col-sm-4 col-form-label text-md-right">Tanggal Album</label>
            <div class="col-md-6">
                <input id="tgl_kegiatan" type="date" class="form-control{{ $errors->has('tgl_kegiatan') ? ' is-invalid' : '' }}" name="tgl_kegiatan" value="{{ old('tgl_kegiatan') }}" required autofocus>
                @if ($errors->has('tgl_kegiatan'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('tgl_kegiatan') }}</strong>
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
