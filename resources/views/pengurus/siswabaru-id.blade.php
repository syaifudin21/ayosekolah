@extends('pengurus.template-pengurus')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
<h1 class="h2">Profil Siswa Baru</h1>
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
    <li class="breadcrumb-item" aria-current="page"><a href="{{url('pengurus/siswabaru')}}">Siswa Baru</a> </li>
    <li class="breadcrumb-item active" aria-current="page">Profil Siswa Baru</li>
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

     

<hr>     
<div class="table-responsive-sm">
<form method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <input type="hidden" name="id" value="{{$siswa->id}}">

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>

        <div class="col-md-6">
            <input id="nama_lengkap" type="text" class="form-control{{ $errors->has('nama_lengkap') ? ' is-invalid' : '' }}" name="nama_lengkap" value="{{ $siswa->nama_lengkap }}" required autofocus>

            @if ($errors->has('nama_lengkap'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('nama_lengkap') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tempat, Tanggal Lahir') }}</label>

        <div class="col-md-6">
            <input id="tgl" type="text" class="form-control{{ $errors->has('tgl') ? ' is-invalid' : '' }}" name="tgl" value="{{ $siswa->tgl }}" required autofocus>

            @if ($errors->has('tgl'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('tgl') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>

        <div class="col-md-6">
            <select class="form-control show-tick" name="jk">
                <option value="" disabled selected>Pilih Gender</option>
                <option value="Laki-laki" {{($siswa->jk=='Laki-laki') ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{($siswa->jk=='Perempuan') ? 'selected' : '' }}>Perempuan</option>
            </select>

            @if ($errors->has('jk'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('jk') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('NISN') }}</label>

        <div class="col-md-6">
            <input id="nim" type="number" class="form-control{{ $errors->has('nim') ? ' is-invalid' : '' }}" name="nim" value="{{ $siswa->nim }}" required autofocus>

            @if ($errors->has('nim'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('nim') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Agama') }}</label>

        <div class="col-md-6">
             <select class="form-control show-tick" name="agama">
                <option value="" disabled selected>Pilih Agama</option>
                <option value="Islam" {{($siswa->agama=='Islam') ? 'selected' : '' }}>Islam</option>
                <option value="Protestan" {{($siswa->agama=='Protestan') ? 'selected' : '' }}>Protestan</option>
                <option value="Katolik" {{($siswa->agama=='Katolik') ? 'selected' : '' }}>Katolik</option>
                <option value="Hindu" {{($siswa->agama=='Hindu') ? 'selected' : '' }}>Hindu</option>
                <option value="Budha" {{($siswa->agama=='Budha') ? 'selected' : '' }}>Budha</option>
                <option value="Kong Hu Cu" {{($siswa->agama=='Kong Hu Cu') ? 'selected' : '' }}>Kong Hu Cu</option>
            </select>

            @if ($errors->has('agama'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('agama') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

        <div class="col-md-6">
            <textarea id="alamat" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="alamat" required autofocus>{{ $siswa->alamat }}</textarea>

            @if ($errors->has('alamat'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('alamat') }}</strong>
                </span>
            @endif
        </div>
    </div>
    
    <div class="form-group row">
        <label for="tinggal" class="col-md-4 col-form-label text-md-right">{{ __('Tinggal Bersama') }}</label>

        <div class="col-md-6">
            <select class="form-control show-tick" name="tinggal">
                <option value="" disabled selected>Tinggal Bersama</option>
                <option value="Orang Tua" {{($siswa->tinggal=='Orang Tua') ? 'selected' : '' }}>Orang Tua</option>
                <option value="Kost" {{($siswa->tinggal=='Kost') ? 'selected' : '' }}>Kost</option>
                <option value="Asrama" {{($siswa->tinggal=='Asrama') ? 'selected' : '' }}>Asrama</option>
                <option value="Lainnya" {{($siswa->tinggal=='Lainnya') ? 'selected' : '' }}>Lainnya</option>
            </select>

            @if ($errors->has('transportasi'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('transportasi') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Alat Transportasi') }}</label>

        <div class="col-md-6">
            <select class="form-control show-tick" name="transportasi">
                <option value="" disabled selected>Pilih Alat Transportasi</option>
                <option value="Sepeda Motor" {{($siswa->transportasi=='Sepeda Motor') ? 'selected' : '' }}>Sepeda Motor</option>
                <option value="Jalan Kaki" {{($siswa->transportasi=='Jalan Kaki') ? 'selected' : '' }}>Jalan Kaki</option>
                <option value="Transportasi Umum" {{($siswa->transportasi=='Transportasi Umum') ? 'selected' : '' }}>Transportasi Umum</option>
                <option value="Lainnya" {{($siswa->transportasi=='Lainnya') ? 'selected' : '' }}>Lainnya</option>
            </select>

            @if ($errors->has('transportasi'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('transportasi') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="tinggi" class="col-md-4 col-form-label text-md-right">{{ __('Tinggi') }}</label>

        <div class="col-md-6">
            <input id="tinggi" type="number" class="form-control{{ $errors->has('tinggi') ? ' is-invalid' : '' }}" name="tinggi" value="{{ $siswa->tinggi }}" required autofocus>

            @if ($errors->has('tinggi'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('tinggi') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="berat" class="col-md-4 col-form-label text-md-right">{{ __('Berat Badan') }}</label>

        <div class="col-md-6">
            <input id="berat" type="number" class="form-control{{ $errors->has('berat') ? ' is-invalid' : '' }}" name="berat" value="{{ $siswa->berat }}" required autofocus>

            @if ($errors->has('berat'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('berat') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="jarak_sekolah" class="col-md-4 col-form-label text-md-right">{{ __('Jarak Sekolah') }}</label>

        <div class="col-md-6">
            <input id="jarak_sekolah" type="text" class="form-control{{ $errors->has('jarak_sekolah') ? ' is-invalid' : '' }}" name="jarak_sekolah" value="{{ $siswa->jarak_sekolah }}" required autofocus>

            @if ($errors->has('jarak_sekolah'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('jarak_sekolah') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="tempu_sekolah" class="col-md-4 col-form-label text-md-right">{{ __('Waktu Tempuh Sekolah') }}</label>

        <div class="col-md-6">
            <input id="tempu_sekolah" type="text" class="form-control{{ $errors->has('tempu_sekolah') ? ' is-invalid' : '' }}" name="tempu_sekolah" value="{{ $siswa->tempu_sekolah }}" required autofocus>

            @if ($errors->has('tempu_sekolah'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('tempu_sekolah') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="anak_ke" class="col-md-4 col-form-label text-md-right">{{ __('Anak Ke - ') }}</label>

        <div class="col-md-6">
            <input id="anak_ke" type="text" class="form-control{{ $errors->has('anak_ke') ? ' is-invalid' : '' }}" name="anak_ke" value="{{ $siswa->anak_ke }}" autofocus>

            @if ($errors->has('anak_ke'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('anak_ke') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="jml_saudara" class="col-md-4 col-form-label text-md-right">{{ __('Jumlah Saudara') }}</label>

        <div class="col-md-6">
            <input id="jml_saudara" type="text" class="form-control{{ $errors->has('jml_saudara') ? ' is-invalid' : '' }}" name="jml_saudara" value="{{ $siswa->jml_saudara }}" autofocus>

            @if ($errors->has('jml_saudara'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('jml_saudara') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nomor HP') }}</label>

        <div class="col-md-6">
            <input id="nomor_hp" type="number" class="form-control{{ $errors->has('nomor_hp') ? ' is-invalid' : '' }}" name="nomor_hp" value="{{ $siswa->nomor_hp }}" required autofocus>

            @if ($errors->has('nomor_hp'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('nomor_hp') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Ayah') }}</label>

        <div class="col-md-6">
            <input id="nama_ayah" type="text" class="form-control{{ $errors->has('nama_ayah') ? ' is-invalid' : '' }}" name="nama_ayah" value="{{ $siswa->nama_ayah }}" required autofocus>

            @if ($errors->has('nama_ayah'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('nama_ayah') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tempat, Tanggal Lahir Ayah') }}</label>

        <div class="col-md-6">
            <input id="tgl_ayah" type="text" class="form-control{{ $errors->has('tgl_ayah') ? ' is-invalid' : '' }}" name="tgl_ayah" value="{{ $siswa->tgl_ayah }}" required autofocus>

            @if ($errors->has('tgl_ayah'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('tgl_ayah') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Pendidikan Terakhir Ayah') }}</label>

        <div class="col-md-6">
            <input id="pendidikan_ayah" type="text" class="form-control{{ $errors->has('pendidikan_ayah') ? ' is-invalid' : '' }}" name="pendidikan_ayah" value="{{ $siswa->pendidikan_ayah }}" required autofocus>

            @if ($errors->has('pendidikan_ayah'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('pendidikan_ayah') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Perkerjaan Ayah') }}</label>

        <div class="col-md-6">
            <input id="pekerjaan_ayah" type="text" class="form-control{{ $errors->has('pekerjaan_ayah') ? ' is-invalid' : '' }}" name="pekerjaan_ayah" value="{{ $siswa->pekerjaan_ayah }}" autofocus>

            @if ($errors->has('pekerjaan_ayah'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('pekerjaan_ayah') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Penghasilan Ayah') }}</label>

        <div class="col-md-6">
            <input id="penghasilan_ayah" type="text" class="form-control{{ $errors->has('penghasilan_ayah') ? ' is-invalid' : '' }}" name="penghasilan_ayah" value="{{ $siswa->penghasilan_ayah }}" autofocus>

            @if ($errors->has('penghasilan_ayah'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('penghasilan_ayah') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Ibu') }}</label>

        <div class="col-md-6">
            <input id="nama_ibu" type="text" class="form-control{{ $errors->has('nama_ibu') ? ' is-invalid' : '' }}" name="nama_ibu" value="{{ $siswa->nama_ibu }}" required autofocus>

            @if ($errors->has('nama_ibu'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('nama_ibu') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tempat, Tanggal Lahir Ibu') }}</label>

        <div class="col-md-6">
            <input id="tgl_ibu" type="text" class="form-control{{ $errors->has('tgl_ibu') ? ' is-invalid' : '' }}" name="tgl_ibu" value="{{ $siswa->tgl_ibu }}" required autofocus>

            @if ($errors->has('tgl_ibu'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('tgl_ibu') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Pendidikan Terakhir Ibu') }}</label>

        <div class="col-md-6">
            <input id="pendidikan_ibu" type="text" class="form-control{{ $errors->has('pendidikan_ibu') ? ' is-invalid' : '' }}" name="pendidikan_ibu" value="{{ $siswa->pendidikan_ibu }}" required autofocus>

            @if ($errors->has('pendidikan_ibu'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('pendidikan_ibu') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Penghasilan Ibu') }}</label>

        <div class="col-md-6">
            <input id="penghasilan_ibu" type="text" class="form-control{{ $errors->has('penghasilan_ibu') ? ' is-invalid' : '' }}" name="penghasilan_ibu" value="{{ $siswa->penghasilan_ibu }}" autofocus>

            @if ($errors->has('penghasilan_ibu'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('penghasilan_ibu') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Perkerjaan Ibu') }}</label>

        <div class="col-md-6">
            <input id="pekerjaan_ibu" type="text" class="form-control{{ $errors->has('pekerjaan_ibu') ? ' is-invalid' : '' }}" name="pekerjaan_ibu" value="{{ $siswa->pekerjaan_ibu }}" required autofocus>

            @if ($errors->has('pekerjaan_ibu'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('pekerjaan_ibu') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Alamat Orang Tua') }}</label>

        <div class="col-md-6">
            <textarea id="alamat_ortu" class="form-control{{ $errors->has('alamat_ortu') ? ' is-invalid' : '' }}" name="alamat_ortu" required autofocus>{{ $siswa->alamat_ortu }}</textarea>

            @if ($errors->has('alamat_ortu'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('alamat_ortu') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nomor HP Orang Tua') }}</label>

        <div class="col-md-6">
            <input id="nomor_hp_ortu" type="number" class="form-control{{ $errors->has('nomor_hp_ortu') ? ' is-invalid' : '' }}" name="nomor_hp_ortu" value="{{ $siswa->nomor_hp_ortu }}" required autofocus>

            @if ($errors->has('nomor_hp_ortu'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('nomor_hp_ortu') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Keterangan Ayah') }}</label>

        <div class="col-md-6">
            <select class="form-control show-tick" name="keterangan_ayah">
                <option value="Hidup" {{($siswa->keterangan_ayah=='Hidup') ? 'selected' : '' }} selected >Hidup</option>
                <option value="Meninggal" {{($siswa->keterangan_ayah=='Meninggal') ? 'selected' : '' }}>Meninggal</option>
            </select>

            @if ($errors->has('keterangan_ayah'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('keterangan_ayah') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Keterangan Ibu') }}</label>

        <div class="col-md-6">
            <select class="form-control show-tick" name="keterangan_ibu">
                <option value="Hidup" {{($siswa->keterangan_ibu=='Hidup') ? 'selected' : '' }} selected >Hidup</option>
                <option value="Meninggal" {{($siswa->keterangan_ibu=='Meninggal') ? 'selected' : '' }}>Meninggal</option>
            </select>

            @if ($errors->has('keterangan_ibu'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('keterangan_ibu') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Sekolah Asal') }}</label>

        <div class="col-md-6">
            <input id="sekolah_asal" type="text" class="form-control{{ $errors->has('sekolah_asal') ? ' is-invalid' : '' }}" name="sekolah_asal" value="{{ $siswa->sekolah_asal }}" required autofocus>

            @if ($errors->has('sekolah_asal'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('sekolah_asal') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Alamat Sekolah') }}</label>

        <div class="col-md-6">
            <input id="sekolah_alamat" type="text" class="form-control{{ $errors->has('sekolah_alamat') ? ' is-invalid' : '' }}" name="sekolah_alamat" value="{{ $siswa->sekolah_alamat }}" required autofocus>

            @if ($errors->has('sekolah_alamat'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('sekolah_alamat') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Angkatan') }}</label>

        <div class="col-md-6">
            <input id="sekolah_angkatan" type="text" class="form-control{{ $errors->has('sekolah_angkatan') ? ' is-invalid' : '' }}" name="sekolah_angkatan" value="{{ $siswa->sekolah_angkatan }}" required autofocus>

            @if ($errors->has('sekolah_angkatan'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('sekolah_angkatan') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Berkas') }}</label>

        <div class="col-md-6">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <img src="{{asset('images/siswa/'.$siswa->foto )}}" alt="..." class="img-thumbnail">
                    <input id="foto" type="file" class="form-control{{ $errors->has('foto') ? ' is-invalid' : '' }}" name="foto" value="{{ old('foto') }}" autofocus>
                    @if ($errors->has('foto'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('foto') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-sm-6 col-md-4">
                    <img src="{{asset('images/siswa/'.$siswa->ijazah )}}" alt="..." class="img-thumbnail">
                    <input id="ijazah" type="file" class="form-control{{ $errors->has('ijazah') ? ' is-invalid' : '' }}" name="ijazah" value="{{ old('ijazah') }}" autofocus>
                    @if ($errors->has('ijazah'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('ijazah') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" formaction="{{ route('pengurus.siswabaru.update') }}"  class="btn btn-primary">
                {{ __('Update') }}
            </button>
        </div>
    </div>
</form>

<hr>
</div>

</div>
@endsection
@section('script')

@endsection
