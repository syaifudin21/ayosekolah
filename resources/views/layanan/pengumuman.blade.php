@extends($template)

@section('head')

<link href="{{asset('css/jquery.datetimepicker.min.css')}}" rel="stylesheet">

@endsection
@section('content')

<div class="nav-scroller bg-white box-shadow">
   <ul class="nav nav-underline" id="myTab" role="tablist">
        <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Pengumuman</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#tambah" role="tab" aria-controls="profile" aria-selected="false">Tambah</a>
        </li>
    </ul>
</div>

<br><br>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
<h1 class="h2">Pengumuman {{$objek}} </h1>
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
                    <th>Nama Pengumuman</th>
                    <th>Waktu Tayang</th>
                    <th>Waktu Berakhir</th>
                    <th>Auth - id</th>
                    <th>Objek - id</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php $n=1;?>
            <tbody>
                @foreach($pengumumans as $pengumuman)
                <tr>
                    <?php 
                        if ($pengumuman->status_user == 'pengurus') {
                            $dd = App\Models\Pengurus::find($pengumuman->id_user);
                                $nama = (!empty($dd))? $dd->nama : 'NN';
                        }elseif ($pengumuman->status_user == 'guru') {
                            $dd = App\Models\Pengajars::find($pengumuman->id_user);
                                $nama = (!empty($dd))? $dd->nama : 'NN';
                        }elseif ($pengumuman->status_user == 'siswa') {
                            $dd = App\Models\Siswas::find($pengumuman->id_user);
                                $nama = (!empty($dd))? $dd->nama : 'NN';
                        }else{
                            $nama = 'NN';
                        }
                    ?>
                    <td>{{$n++}}</td>
                    <td>{{$pengumuman->nama_pengumuman}}</td>
                    <td>{{tanggal_indo(date('Y-m-d-G-i-s', strtotime($pengumuman->waktu_mulai)), true)}}</td>
                    <td>{{tanggal_indo(date('Y-m-d-G-i-s', strtotime($pengumuman->waktu_selesai)), true)}}</td>
                    <td>{{$pengumuman->status_user}} - {{$nama}}</td>
                    <td>{{$pengumuman->objek}} - {{$pengumuman->id_objek}}</td>
                    <td>{{$pengumuman->status}}</td>
                    <form method="POST" action="{{url('layanan/pengumuman/'.$pengumuman->id)}}">
                    <td>
                        <a href="{{url(strtolower($auth).'/'.$menu.'/pengumuman/'.$pengumuman->id.'/'.$pengumuman->slug_pengumuman)}}" class="btn btn-outline-success btn-sm">Lihat</a>
                        <a href="{{url(strtolower($auth).'/'.$menu.'/pengumuman/update/'.$pengumuman->id.'/'.$pengumuman->id)}}" class="btn btn-outline-primary btn-sm">Update</a>
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
    <form method="POST" action="{{route('pengumuman.tambah')}}"  enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="status_user" value="{{$auth}}">
        <input type="hidden" name="id_user" value="{{$id_auth}}">
        <input type="hidden" name="objek" value="{{$objek}}">
        <input type="hidden" name="id_objek" value="{{(isset($id_objek)? $id_objek : '')}}">
        <input type="hidden" name="id_latih" value="{{(isset($id_latih)? $id_latih : '')}}">
        
        <div class="form-group row">
            <label for="nama_pengumuman" class="col-sm-4 col-form-label text-md-right">Nama Pengumumaman</label>
            <div class="col-md-6">
                <input id="nama_pengumuman" type="text" class="form-control{{ $errors->has('nama_pengumuman') ? ' is-invalid' : '' }}" name="nama_pengumuman" value="{{ old('nama_pengumuman') }}" required autofocus>
                @if ($errors->has('nama_pengumuman'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('nama_pengumuman') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="isi" class="col-sm-4 col-form-label text-md-right">Isi Pengumuman</label>
            <div class="col-md-6">
                <textarea id="deskripsi" class="form-control{{ $errors->has('isi') ? ' is-invalid' : '' }}" name="isi" required autofocus>{{ old('isi') }}</textarea>
                @if ($errors->has('isi'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('isi') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="waktu_mulai" class="col-sm-4 col-form-label text-md-right">Waktu Mulai</label>
            <div class="col-md-6">
                <input id="datetimepicker1" type="text" class="form-control{{ $errors->has('waktu_mulai') ? ' is-invalid' : '' }}" name="waktu_mulai" value="{{ old('waktu_mulai') }}" required autofocus>
                @if ($errors->has('waktu_mulai'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('waktu_mulai') }}</strong>
                    </span>
                @endif
            </div>
        </div>
         <div class="form-group row">
            <label for="waktu_selesai" class="col-sm-4 col-form-label text-md-right">Waktu Selesai</label>
            <div class="col-md-6">
                <input id="datetimepicker2" type="text" class="form-control{{ $errors->has('waktu_selesai') ? ' is-invalid' : '' }}" name="waktu_selesai" value="{{ old('waktu_selesai') }}" required autofocus>
                @if ($errors->has('waktu_selesai'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('waktu_selesai') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="lampiran" class="col-sm-4 col-form-label text-md-right">Lampiran</label>
            <div class="col-md-6">
                <input id="lampiran" type="file" class="form-control{{ $errors->has('lampiran') ? ' is-invalid' : '' }}" name="lampiran" value="{{ old('lampiran') }}" autofocus>
                @if ($errors->has('lampiran'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('lampiran') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        @if($auth == 'Pengurus')
        <div class="form-group row">
            <label for="status" class="col-sm-4 col-form-label text-md-right">Status Tampil</label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status">
                    <option value="" disabled selected >Pilih Status Tampil</option>
                    <option value="Tampil" {{($errors->has('status') =='Tampil')? 'selected' : ''}}>Tampil</option>
                    <option value="Sembunyikan" {{($errors->has('status') =='Sembunyikan')? 'selected' : ''}}>Sembunyikan</option>
                </select>
                @if ($errors->has('status'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('status') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        @endif

        
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

<script type="text/javascript" src="{{asset('js/jquery.datetimepicker.full.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.datetimepicker.full.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.datetimepicker.min.js')}}"></script>
<script type="text/javascript">
    jQuery.datetimepicker.setLocale('id');

    $('#datetimepicker1').datetimepicker({
     i18n:{
      de:{
       months:[
        'Januari','Februari','Maret','April',
        'Mei','Juni','Juli','Agustus',
        'September','Oktober','November','Desember',
       ],
       dayOfWeek:[
        "Minggu", "Senin", "Selasa", "Rabu", 
        "Kamis", "Jumat", "Sabtu.",
       ]
      }
     },
     timepicker:true,
     format:'Y-m-d H:i'
    });
    $('#datetimepicker2').datetimepicker({
     i18n:{
      de:{
       months:[
        'Januari','Februari','Maret','April',
        'Mei','Juni','Juli','Agustus',
        'September','Oktober','November','Desember',
       ],
       dayOfWeek:[
        "Minggu", "Senin", "Selasa", "Rabu", 
        "Kamis", "Jumat", "Sabtu.",
       ]
      }
     },
     timepicker:true,
     format:'Y-m-d H:i'
    });
</script>

@endsection

