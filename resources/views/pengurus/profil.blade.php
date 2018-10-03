@extends('pengurus.template-pengurus')
@section('head')
<link href="{{asset('plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endsection
@section('content')

<div class="nav-scroller bg-white box-shadow">
   <ul class="nav nav-underline" id="myTab" role="tablist">
        <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Profil</a>
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
    <li class="breadcrumb-item active" aria-current="page">Profil Pengurus {{$pengurus->nama}}</li>
  </ol>
</nav>


@if(Session::has('success'))
    <div class="alert alert-info alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ Session::get('success') }}
    </div>
@endif
@if(Session::has('gagal'))
    <div class="alert alert-danger alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ Session::get('gagal') }}
    </div>
@endif

<br>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="profile-tab">
    <form method="POST" action="{{route('pengurus.update')}}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group row">
            <label for="nama" class="col-sm-4 col-form-label text-md-right">Nama Pengurus</label>
            <div class="col-md-6">
                <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ $pengurus->nama }}" required autofocus>
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
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $pengurus->email }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="passwordlama" class="col-sm-4 col-form-label text-md-right">Password  <small>(Wajib)</small></label>
            <div class="col-md-6">
                <input id="passwordlama" type="password" class="form-control{{ $errors->has('passwordlama') ? ' is-invalid' : '' }}" name="passwordlama" required autofocus>
                @if ($errors->has('passwordlama'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('passwordlama') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="passwordbaru" class="col-sm-4 col-form-label text-md-right">Password Baru  <small>(Opsional)</small></label>
            <div class="col-md-6">
                <input id="passwordbaru" type="password" class="form-control{{ $errors->has('passwordbaru') ? ' is-invalid' : '' }}" name="passwordbaru" autofocus>
                @if ($errors->has('passwordbaru'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('passwordbaru') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="cpasswordbaru" class="col-md-4 col-form-label text-md-right">Confirm Password Baru  <small>(Opsional)</small></label>

            <div class="col-md-6">
                <input id="cpasswordbaru" type="password" class="form-control" name="cpasswordbaru">
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

@endsection

@section('script')
@endsection
