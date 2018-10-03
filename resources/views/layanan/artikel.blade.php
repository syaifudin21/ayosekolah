@extends($template)

@section('head')
<link href="{{asset('plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endsection
@section('content')


<div class="nav-scroller bg-white box-shadow">
   <ul class="nav nav-underline" id="myTab" role="tablist">
        <li class="nav-item">
        <a class="nav-link {{(empty($errors->all()))?'active':''}} " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Artikel</a>
        </li>
        <li class="nav-item">
        <a class="nav-link {{(empty($errors->all()))?'':'active'}}" id="profile-tab" data-toggle="tab" href="#tambah" role="tab" aria-controls="profile" aria-selected="false">Tambah</a>
        </li>
    </ul>
</div>

<br><br>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
<h1 class="h2">Artikel</h1>
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
@if(!empty($errors->all()))
    <div class="alert alert-danger alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        @foreach ($errors->all() as $message)
            {{$message}}
        @endforeach
    </div>
@endif

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade {{(empty($errors->all()))?'show active':''}}" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="table-responsive-sm">
        <table id="example" class="table table-hover table-sm table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul Artikel</th>
                    <th style="width: 400px">Teks Pembuka</th>
                    <th>Tag</th>
                    <th>Auth - id</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php $n=1;?>
            <tbody>
                @foreach($artikels as $artikel)
                <tr>
                    <?php 
                        if ($artikel->status_user == 'pengurus') {
                            $dd = App\Models\Pengurus::find($artikel->id_user);
                                $nama = (!empty($dd))? $dd->nama : 'NN';
                        }elseif ($artikel->status_user == 'guru') {
                            $dd = App\Models\Pengajars::find($artikel->id_user);
                                $nama = (!empty($dd))? $dd->nama : 'NN';
                        }elseif ($artikel->status_user == 'siswa') {
                            $dd = App\Models\Siswas::find($artikel->id_user);
                                $nama = (!empty($dd))? $dd->nama : 'NN';
                        }else{
                            $nama = 'NN';
                        }
                    ?>
                    <td>{{$n++}}</td>
                    <td><b>{{limit_words($artikel->judul, 10)}}</b></td>
                    <td>{{limit_words($artikel->text_pembuka, 15)}}</td>
                    <td>{{$artikel->tag}}</td>
                    <td>{{$artikel->status_user}} - {{$nama}}</td>
                    <form method="POST" action="{{url('layanan/artikel/'.$artikel->id)}}">
                    <td><a href="{{url($auth.'/artikel/'.$artikel->id)}}" class="btn btn-outline-success btn-sm">Lihat</a> 
                        <a href="{{url($auth.'/artikel/edit/'.$artikel->id)}}" class="btn btn-outline-primary btn-sm">Update</a> 
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

    <div class="tab-pane fade {{(empty($errors->all()))?'':'show active'}}" id="tambah" role="tabpanel" aria-labelledby="profile-tab">
    <form method="POST" action="{{route('artikel.tambah')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
    <input type="hidden" name="status_user" value="{{$auth}}">
    <input type="hidden" name="id_user" value="{{$id_auth}}">
        <div class="form-group row">
            <div class="col-md-12">
                <input id="judul" type="text" class="form-control{{ $errors->has('judul') ? ' is-invalid' : '' }}" name="judul" value="{{ old('judul') }}" required autofocus placeholder="Judul">
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
                        <textarea id="artikel" class="form-control{{ $errors->has('artikel') ? ' is-invalid' : '' }} editor" name="artikel" required autofocus rows="20">{{ old('artikel') }}</textarea> 
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
                    <div class="col m2 s12">
                        <img class="img img-thumbnail" width="100%" id="ijazah">
                    </div>
                    <div class="col-md-12">
                        <label for="lampiran" class="col-form-label">Gambar</label>
                        <input id="lampiran" type="file" onchange="fotoURl(this)" class="form-control{{ $errors->has('lampiran') ? ' is-invalid' : '' }}" name="lampiran" value="{{ old('lampiran') }}" required autofocus>
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
                        <input id="tag" type="text" class="form-control{{ $errors->has('tag') ? ' is-invalid' : '' }}" name="tag" value="{{ old('tag') }}" required autofocus placeholder="Tag">
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
                        <textarea id="text_pembuka" class="form-control{{ $errors->has('text_pembuka') ? ' is-invalid' : '' }}" rows="7" placeholder="Teks Pembuka, informasi singkat hal yang menarik" name="text_pembuka" required autofocus>{{ old('text_pembuka') }}</textarea>
                        @if ($errors->has('text_pembuka'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('text_pembuka') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-block">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
        
        <hr>

            
        </form>
    </div>
</div>

@endsection

@section('script')
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/adapters/jquery.js') }}"></script>
<script>
    $('.editor').ckeditor();
    function fotoURl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#ijazah').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
