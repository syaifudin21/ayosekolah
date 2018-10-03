@extends('sekolah.template-sekolah')
@section('head')
<link href="{{asset('plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endsection
@section('content')

<div class="nav-scroller bg-white box-shadow">
   <ul class="nav nav-underline" id="myTab" role="tablist">
        <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Atribut</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#tambah" role="tab" aria-controls="profile" aria-selected="false">Tambah</a>
        </li>
    </ul>
</div>

<br><br>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
<h1 class="h2">Atribut</h1>
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
    <li class="breadcrumb-item active" aria-current="page">Atribut</li>
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
		                <th>Atribut</th>
                        <th>Action</th>
		            </tr>
		        </thead>
		        <?php $n=1;?>
		        <tbody>
		            @foreach($atributs as $atribut)
		            <tr>
		                <td>{{$n++}}</td>
		                <td>{{$atribut->atribut}}</td>
		                <form method="POST" action="{{url('sekolah/atribut/delete/'.$atribut->id)}}">
		                <td><a href="{{url('sekolah/atribut/'.$atribut->id)}}" class="btn btn-outline-success btn-sm">Lihat</a> <a href="{{url('sekolah/atribut/update/'.$atribut->id)}}" class="btn btn-outline-primary btn-sm">Update</a> 
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
    <form method="POST" action="{{route('atribut.tambah')}}">
        {{ csrf_field() }}
        
        <div class="form-group row">
            <label for="nama" class="col-sm-4 col-form-label text-md-right">Atribut</label>
            <div class="col-md-6">
                <input id="nama" type="text" class="form-control{{ $errors->has('atribut') ? ' is-invalid' : '' }}" name="atribut" value="{{ old('atribut') }}" required autofocus>
                @if ($errors->has('atribut'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('atribut') }}</strong>
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
