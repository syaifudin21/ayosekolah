@extends('sekolah.template-sekolah')
@section('head')
<link href="{{asset('plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endsection
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
<h1 class="h2">Pengurus</h1>
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
		                <th>Nama</th>
		                <th>Email</th>
		                <th>Status</th>
		                <th>Action</th>
		            </tr>
		        </thead>
		        <?php $n=1;?>
		        <tbody>
		            @foreach($penguruses as $pengurus)
		            <tr>
		                <td>{{$n++}}</td>
		                <td>{{$pengurus->nama}}</td>
		                <td>{{$pengurus->email}}</td>
                    <td>
                    <?php
                      $arr = $pengurus->status;
                      $status = explode(",",$arr);

                      $jumlah = count($status);
                      for ($i=0; $i < $jumlah ; $i++) {
                          if ($status[$i] == '123456') {echo "Artikel ";}
                          elseif ($status[$i] == '211233') {echo "Pengumuman ";}
                          elseif ($status[$i] == '981729') {echo "Album ";}
                          elseif ($status[$i] == '827980') {echo "Kelas ";}
                          elseif ($status[$i] == '981987') {echo "Agenda ";}
                          elseif ($status[$i] == '657842') {echo "Prestasi ";}
                          elseif ($status[$i] == '912879') {echo "Masukkan ";}
                          else{echo "";}
                      }
                    ?>
		                </td>
		                <form method="POST" action="{{url('sekolah/pengurus/delete/'.$pengurus->id)}}">
		                <td><a href="{{url('sekolah/pengurus/'.$pengurus->id)}}" class="btn btn-outline-success btn-sm">Lihat</a> <a href="{{url('sekolah/pengurus/update/'.$pengurus->id)}}" class="btn btn-outline-primary btn-sm">Update</a> 
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
    <form method="POST" action="{{route('sekolah.pengurus.tambah')}}">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="nama" class="col-sm-4 col-form-label text-md-right">Nama Pengurus</label>
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
            <label for="email" class="col-sm-4 col-form-label text-md-right">Email</label>
            <div class="col-md-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-4 col-form-label text-md-right">Password</label>
            <div class="col-md-6">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required autofocus>
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="jenis_mapel" class="col-sm-4 col-form-label text-md-right">Authentication</label>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="status[]" id="artikel" value="123456">
                          <label class="form-check-label" for="artikel">
                            Artikel
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="status[]" id="pengumuman" value="211233">
                          <label class="form-check-label" for="pengumuman">
                            Pengumuman
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="status[]" id="album" value="981729">
                          <label class="form-check-label" for="album">
                            Album
                          </label>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="status[]" id="kelas" value="827980">
                          <label class="form-check-label" for="kelas">
                            Kelas
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="status[]" id="agenda" value="981987">
                          <label class="form-check-label" for="agenda">
                            Agenda
                          </label>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="status[]" id="prestasi" value="657842">
                          <label class="form-check-label" for="prestasi">
                            Prestasi
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="status[]" id="masukan" value="912879">
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
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('script')
@endsection
