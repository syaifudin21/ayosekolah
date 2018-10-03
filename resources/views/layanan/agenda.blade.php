@extends($template)

@section('head')

@endsection

@section('content')

<div class="nav-scroller bg-white box-shadow">
   <ul class="nav nav-underline" id="myTab" role="tablist">
        <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Agenda</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#tambah" role="tab" aria-controls="profile" aria-selected="false">Tambah</a>
        </li>
    </ul>
</div>

<br><br>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
<h1 class="h2">Agenda {{$auth}} </h1>
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
                    <th>Agenda</th>
                    <th>Tanggal</th>
                    <th>Status Tampil</th>
                    <th>Status Agenda</th>
                    <th>Status Public</th>
                    <th>Auth - id</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php $n=1;?>
            <tbody>
                @foreach($agendas as $agenda)
                <tr>
                    <?php 
                        if ($agenda->status_user == 'pengurus') {
                            $dd = App\Models\Pengurus::find($agenda->id_user);
                                $nama = (!empty($dd))? $dd->nama : 'NN';
                        }elseif ($agenda->status_user == 'guru') {
                            $dd = App\Models\Pengajars::find($agenda->id_user);
                                $nama = (!empty($dd))? $dd->nama : 'NN';
                        }elseif ($agenda->status_user == 'siswa') {
                            $dd = App\Models\Siswas::find($agenda->id_user);
                                $nama = (!empty($dd))? $dd->nama : 'NN';
                        }else{
                            $nama = 'NN';
                        }
                    ?>
                    <td>{{$n++}}</td>
                    <td><b>{{$agenda->agenda}}</b> <br> {{$agenda->keterangan}}</td>
                    <td>{{tanggal(date('Y-m-d-G-i-s', strtotime($agenda->waktu)), true)}}</td>
                    <td>{{$agenda->status_tampil}}</td>
                    <td>{{$agenda->status}}</td>
                    <td>{{$agenda->status_public}}</td>
                    <td>{{$agenda->status_user}} - {{$nama}}</td>
                    <form method="POST" action="{{url('layanan/agenda/'.$agenda->id)}}">
                    <td>
                        <a href="{{url(strtolower($auth).'/'.$menu.'/agenda/update/'.$agenda->id)}}" class="btn btn-outline-primary btn-sm">Update</a>
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
    <form method="POST" action="{{route('agenda.tambah')}}"  enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="status_user" value="{{$auth}}">
        <input type="hidden" name="id_user" value="{{$id_auth}}">
        
        <div class="form-group row">
            <label for="agenda" class="col-sm-4 col-form-label text-md-right">Nama Agenda</label>
            <div class="col-md-6">
                <input id="agenda" type="text" class="form-control{{ $errors->has('agenda') ? ' is-invalid' : '' }}" name="agenda" value="{{ old('agenda') }}" required autofocus>
                @if ($errors->has('agenda'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('agenda') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="keterangan" class="col-sm-4 col-form-label text-md-right">Keterangan</label>
            <div class="col-md-6">
                <textarea id="keterangan" class="form-control{{ $errors->has('keterangan') ? ' is-invalid' : '' }}" name="keterangan" required autofocus>{{ old('keterangan') }}</textarea>
                @if ($errors->has('keterangan'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('keterangan') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="waktu" class="col-sm-4 col-form-label text-md-right">Waktu Mulai</label>
            <div class="col-md-6">
                <input id="waktu" type="date" class="form-control{{ $errors->has('waktu') ? ' is-invalid' : '' }}" name="waktu" value="{{ old('waktu') }}" required autofocus>
                @if ($errors->has('waktu'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('waktu') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        @if($auth == 'Pengurus')
        <div class="form-group row">
            <label for="status_tampil" class="col-sm-4 col-form-label text-md-right">Status Tampil</label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->has('status_tampil') ? ' is-invalid' : '' }}" name="status_tampil">
                    <option value="" disabled selected >Pilih Status Tampil</option>
                    <option value="Tampil" {{($errors->has('status_tampil') =='Tampil')? 'selected' : ''}}>Tampil</option>
                    <option value="Sembunyikan" {{($errors->has('status_tampil') =='Sembunyikan')? 'selected' : ''}}>Sembunyikan</option>
                </select>
                @if ($errors->has('status_tampil'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('status_tampil') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="status" class="col-sm-4 col-form-label text-md-right">Status</label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status">
                    <option value="" disabled >Pilih Status Tampil</option>
                    <option value="Terlaksana" {{($errors->has('status') =='Terlaksana')? 'selected' : ''}}>Terlaksana</option>
                    <option value="Setujui" {{($errors->has('status') =='Setujui')? 'selected' : ''}}>Setujui</option>
                    <option value="Batal" {{($errors->has('status') =='Batal')? 'selected' : ''}}>Batal</option>
                    <option value="Rencana" {{($errors->has('status') =='Rencana')? 'selected' : 'selected'}}>Rencana</option>
                </select>
                @if ($errors->has('status'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('status') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="status_public" class="col-sm-4 col-form-label text-md-right">Status Public</label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->has('status_public') ? ' is-invalid' : '' }}" name="status_public">
                    <option value="" disabled >Pilih Status Tampil</option>
                    <option value="Public" {{($errors->has('status_public') =='Public')? 'selected' : 'selected'}}>Public</option>
                    <option value="Organisasi" {{($errors->has('status_public') =='Organisasi')? 'selected' : ''}}>Organisasi</option>
                    <option value="Kelas" {{($errors->has('status_public') =='Kelas')? 'selected' : ''}}>Kelas</option>
                    <option value="Guru" {{($errors->has('status_public') =='Guru')? 'selected' : ''}}>Guru</option>
                    <option value="Siswa" {{($errors->has('status_public') =='Siswa')? 'selected' : ''}}>Siswa</option>
                </select>
                @if ($errors->has('status_public'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('status_public') }}</strong>
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

@endsection

