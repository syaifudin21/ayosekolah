@extends($template)

@section('content')

<div class="nav-scroller bg-white box-shadow">
   <ul class="nav nav-underline" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" href="{{url($auth.'/artikel/'.$id)}}">{{$artikel->judul}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url($auth.'/artikel/edit/'.$id)}}">Update</a>
        </li>
    </ul>
</div>

<br><br>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
<h1 class="h2"> Artikel {{$artikel->judul}}</h1>
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
    <li class="breadcrumb-item"><a href="{{url($auth.'/artikel')}}">Artikel</a></li>
    <li class="breadcrumb-item" aria-current="page">{{$artikel->judul}}</li>
    <li class="breadcrumb-item active" aria-current="page">Update</li>
  </ol>
</nav>

@if(Session::has('success'))
  <div class="alert alert-info alert-dismissable">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      {{ Session::get('success') }}
  </div>
@endif

    <form method="POST" action="{{route('artikel.update')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <input type="hidden" name="id" value="{{$id}}">
    <input type="hidden" name="status_user" value="{{$auth}}">
    <input type="hidden" name="id_user" value="{{$id_auth}}">
        <div class="form-group row">
            <div class="col-md-12">
                <input id="judul" type="text" class="form-control{{ $errors->has('judul') ? ' is-invalid' : '' }}" name="judul" value="{{ $artikel->judul}}" required autofocus placeholder="Judul">
                @if ($errors->has('judul'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('judul') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <textarea id="artikel" class="form-control{{ $errors->has('artikel') ? ' is-invalid' : '' }} editor" name="artikel" required autofocus rows="20">{{ $artikel->artikel}}</textarea> 
                        @if ($errors->has('artikel'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('artikel') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group row">
                    @if(!empty($artikel->lampiran))
                    <div class="col-md-12">
                        <img src="{{url('http://file.smawahasmodel.sch.id/artikel/'.$artikel->lampiran)}}" width="100%">
                    </div>
                    @endif
                    <div class="col-md-12">
                        <label for="lampiran" class="col-form-label">Lampiran</label>
                        <input id="lampiran" type="file" class="form-control{{ $errors->has('lampiran') ? ' is-invalid' : '' }}" name="lampiran" value="{{ old('lampiran') }}" autofocus>
                        @if ($errors->has('lampiran'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('lampiran') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="tag" class="col-form-label">Tag</label>
                        <input id="tag" type="text" class="form-control{{ $errors->has('tag') ? ' is-invalid' : '' }}" name="tag" value="{{ $artikel->tag}}" required autofocus placeholder="Tag">
                        @if ($errors->has('tag'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('tag') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="text_pembuka" class="col-form-label">Pembuka</label>
                        <textarea id="text_pembuka" class="form-control{{ $errors->has('text_pembuka') ? ' is-invalid' : '' }}" rows="7" placeholder="Teks Pembuka, informasi singkat hal yang menarik" name="text_pembuka" required autofocus>{{ $artikel->text_pembuka}}</textarea>
                        @if ($errors->has('text_pembuka'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('text_pembuka') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                    </div>
                </div>
            </div>
        </div>
        
    </form>

@endsection

@section('script')
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/adapters/jquery.js') }}"></script>
<script>
    $('.editor').ckeditor();
</script>
@endsection
