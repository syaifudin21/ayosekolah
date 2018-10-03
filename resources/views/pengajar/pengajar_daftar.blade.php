@extends('sekolah.sekolah')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Daftar Menjadi Pengajar') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('pengajar.daftar') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @if(Session::has('success'))
                            <div class="alert alert-info alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>

                            <div class="col-md-6">
                                <input id="nama_lengkap" type="text" class="form-control{{ $errors->has('nama_lengkap') ? ' is-invalid' : '' }}" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required autofocus>

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
                                <input id="tgl" type="text" class="form-control{{ $errors->has('tgl') ? ' is-invalid' : '' }}" name="tgl" value="{{ old('tgl') }}" required autofocus>

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
                                    <option value="Laki-laki" {{(old('jk')=='Laki-laki') ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{(old('jk')=='Perempuan') ? 'selected' : '' }}>Perempuan</option>
                                </select>

                                @if ($errors->has('jk'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('jk') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('NIM') }}</label>

                            <div class="col-md-6">
                                <input id="nim" type="number" class="form-control{{ $errors->has('nim') ? ' is-invalid' : '' }}" name="nim" value="{{ old('nim') }}" required autofocus>

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
                                    <option value="Islam" {{(old('agama')=='Islam') ? 'selected' : '' }}>Islam</option>
                                    <option value="Protestan" {{(old('agama')=='Protestan') ? 'selected' : '' }}>Protestan</option>
                                    <option value="Katolik" {{(old('agama')=='Katolik') ? 'selected' : '' }}>Katolik</option>
                                    <option value="Hindu" {{(old('agama')=='Hindu') ? 'selected' : '' }}>Hindu</option>
                                    <option value="Budha" {{(old('agama')=='Budha') ? 'selected' : '' }}>Budha</option>
                                    <option value="Kong Hu Cu" {{(old('agama')=='Kong Hu Cu') ? 'selected' : '' }}>Kong Hu Cu</option>
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
                                <input id="alamat" type="text" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="alamat" value="{{ old('alamat') }}" required autofocus>

                                @if ($errors->has('alamat'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Alat Transportasi') }}</label>

                            <div class="col-md-6">
                                <select class="form-control show-tick" name="transportasi">
                                    <option value="" disabled selected>Pilih Alat Transportasi</option>
                                    <option value="Sepeda Motor" {{(old('transportasi')=='Sepeda Motor') ? 'selected' : '' }}>Sepeda Motor</option>
                                    <option value="Jalan Kaki" {{(old('transportasi')=='Jalan Kaki') ? 'selected' : '' }}>Jalan Kaki</option>
                                    <option value="Transportasi Umum" {{(old('transportasi')=='Transportasi Umum') ? 'selected' : '' }}>Transportasi Umum</option>
                                    <option value="Lainnya" {{(old('transportasi')=='Lainnya') ? 'selected' : '' }}>Lainnya</option>
                                </select>

                                @if ($errors->has('transportasi'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('transportasi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nomor HP') }}</label>

                            <div class="col-md-6">
                                <input id="nomor_hp" type="number" class="form-control{{ $errors->has('nomor_hp') ? ' is-invalid' : '' }}" name="nomor_hp" value="{{ old('nomor_hp') }}" required autofocus>

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
                                <input id="nama_ayah" type="text" class="form-control{{ $errors->has('nama_ayah') ? ' is-invalid' : '' }}" name="nama_ayah" value="{{ old('nama_ayah') }}" required autofocus>

                                @if ($errors->has('nama_ayah'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nama_ayah') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Ibu') }}</label>

                            <div class="col-md-6">
                                <input id="nama_ibu" type="text" class="form-control{{ $errors->has('nama_ibu') ? ' is-invalid' : '' }}" name="nama_ibu" value="{{ old('nama_ibu') }}" required autofocus>

                                @if ($errors->has('nama_ibu'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nama_ibu') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Alamat Orang Tua') }}</label>

                            <div class="col-md-6">
                                <input id="alamat_ortu" type="text" class="form-control{{ $errors->has('alamat_ortu') ? ' is-invalid' : '' }}" name="alamat_ortu" value="{{ old('alamat_ortu') }}" required autofocus>

                                @if ($errors->has('alamat_ortu'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('alamat_ortu') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Keterangan Ayah') }}</label>

                            <div class="col-md-6">
                                <select class="form-control show-tick" name="keterangan_ayah">
                                    <option value="Hidup" {{(old('keterangan_ayah')=='Hidup') ? 'selected' : '' }} selected >Hidup</option>
                                    <option value="Meninggal" {{(old('keterangan_ayah')=='Meninggal') ? 'selected' : '' }}>Meninggal</option>
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
                                    <option value="Hidup" {{(old('keterangan_ibu')=='Hidup') ? 'selected' : '' }} selected >Hidup</option>
                                    <option value="Meninggal" {{(old('keterangan_ibu')=='Meninggal') ? 'selected' : '' }}>Meninggal</option>
                                </select>

                                @if ($errors->has('keterangan_ibu'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('keterangan_ibu') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Lulusan Terakhir') }}</label>

                            <div class="col-md-6">
                                <input id="lulusan" type="text" class="form-control{{ $errors->has('lulusan') ? ' is-invalid' : '' }}" name="lulusan" value="{{ old('lulusan') }}" required autofocus>

                                @if ($errors->has('lulusan'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('lulusan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</label>

                            <div class="col-md-6">
                                <input id="foto" type="file" class="form-control{{ $errors->has('foto') ? ' is-invalid' : '' }}" name="foto" value="{{ old('foto') }}" required autofocus>

                                @if ($errors->has('foto'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('foto') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Ijazah') }}</label>

                            <div class="col-md-6">
                                <input id="ijazah" type="file" class="form-control{{ $errors->has('ijazah') ? ' is-invalid' : '' }}" name="ijazah" value="{{ old('ijazah') }}" required autofocus>

                                @if ($errors->has('ijazah'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('ijazah') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
