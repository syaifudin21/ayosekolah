@extends('sekolah.sekolah')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('sekolah.daftar') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="nama_sekolah" class="col-md-4 col-form-label text-md-right">{{ __('Nama Sekolah') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama_sekolah" required value="{{old('nama_sekolah')}}">

                                @if ($errors->has('nama_sekolah'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nama_sekolah') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Singkat Sekolah') }}</label>

                            <div class="col-md-6">
                                <input id="nama_singkat_sekolah" type="text" class="form-control{{ $errors->has('nama_singkat_sekolah') ? ' is-invalid' : '' }}" name="nama_singkat_sekolah" value="{{ old('nama_singkat_sekolah') }}" required autofocus>

                                @if ($errors->has('nama_singkat_sekolah'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nama_singkat_sekolah') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="alamat" required value="{{old('alamat')}}">
                                
                                @if ($errors->has('alamat'))
                                    <span class="wak-feedback">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Login Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email_sekolah" class="col-md-4 col-form-label text-md-right">{{ __('Email Sekolah') }}</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email_sekolah" required value="{{old('email_sekolah')}}">
                                
                                @if ($errors->has('email_sekolah'))
                                    <span class="wak-feedback">
                                        <strong>{{ $errors->first('email_sekolah') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="logo" class="col-md-4 col-form-label text-md-right">{{ __('Logo') }}</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control" name="logo" required>

                                @if ($errors->has('logo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('logo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="npsn" class="col-md-4 col-form-label text-md-right">{{ __('NPSN') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="npsn" required value="{{old('npsn')}}">

                                @if ($errors->has('npsn'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('npsn') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenjang" class="col-md-4 col-form-label text-md-right">{{ __('Jenjang') }}</label>

                            <div class="col-md-6">
                                <select class="form-control show-tick" name="jenjang">
                                    <option value="" disabled selected>Pilih Jenjang</option>
                                    <option value="SD" {{(old('jenjang')=='SD') ? 'selected' : '' }}>SD</option>
                                    <option value="MI" {{(old('jenjang')=='MI') ? 'selected' : '' }}>MI</option>
                                    <option value="SMP" {{(old('jenjang')=='SMP') ? 'selected' : '' }}>SMP</option>
                                    <option value="MTs" {{(old('jenjang')=='MTs') ? 'selected' : '' }}>MTs</option>
                                    <option value="SMA" {{(old('jenjang')=='SMA') ? 'selected' : '' }}>SMA</option>
                                    <option value="SMK" {{(old('jenjang')=='SMK') ? 'selected' : '' }}>SMK</option>
                                    <option value="MA" {{(old('jenjang')=='MA') ? 'selected' : '' }}>MA</option>
                                </select>

                                @if ($errors->has('jenjang'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('jenjang') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="waktu_sekolah" class="col-md-4 col-form-label text-md-right">{{ __('Waktu Sekolah') }}</label>

                            <div class="col-md-6">
                                <select class="form-control show-tick" name="waktu_sekolah">
                                    <option value="" disabled selected>Waktu Sekolah</option>
                                    <option value="Pagi" {{(old('waktu_sekolah')=='Pagi') ? 'selected' : '' }}>Pagi</option>
                                    <option value="Siang" {{(old('waktu_sekolah')=='Siang') ? 'selected' : '' }}>Siang</option>
                                    <option value="Pagi & Siang" {{(old('waktu_sekolah')=='Pagi & Siang') ? 'selected' : '' }}>Pagi & Siang</option>
                                </select>
                                @if ($errors->has('waktu_sekolah'))
                                    <span class="wak-feedback">
                                        <strong>{{ $errors->first('waktu_sekolah') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status Sekolah') }}</label>

                            <div class="col-md-6">
                                <select class="form-control show-tick" name="status">
                                    <option value="" disabled selected>Status</option>
                                    <option value="Negeri" {{(old('status')=='Negeri') ? 'selected' : '' }}>Negeri</option>
                                    <option value="Swasta" {{(old('status')=='Swasta') ? 'selected' : '' }}>Swasta</option>
                                </select>
                                @if ($errors->has('status'))
                                    <span class="wak-feedback">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kode_pos" class="col-md-4 col-form-label text-md-right">{{ __('Kode Pos') }}</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" name="kode_pos" required value="{{old('kode_pos')}}">
                                
                                @if ($errors->has('kode_pos'))
                                    <span class="wak-feedback">
                                        <strong>{{ $errors->first('kode_pos') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kurikulum" class="col-md-4 col-form-label text-md-right">{{ __('Kurikulum Sekolah') }}</label>

                            <div class="col-md-6">
                                <select class="form-control show-tick" name="kurikulum">
                                    <option value="" disabled selected>Kurikulum</option>
                                    <option value="KTSP 2006" {{(old('kurikulum')=='KTSP 2006') ? 'selected' : '' }}>KTSP 2006</option>
                                    <option value="Kurikulum 2013" {{(old('kurikulum')=='Kurikulum 2013') ? 'selected' : '' }}>Kurikulum 2013</option>
                                </select>
                                
                                @if ($errors->has('kurikulum'))
                                    <span class="wak-feedback">
                                        <strong>{{ $errors->first('kurikulum') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_telp" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Telepon') }}</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" name="no_telp" required value="{{old('no_telp')}}">
                                
                                @if ($errors->has('no_telp'))
                                    <span class="wak-feedback">
                                        <strong>{{ $errors->first('no_telp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="no_fax" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Fax') }}</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" name="no_fax" required value="{{old('no_fax')}}">
                                
                                @if ($errors->has('no_fax'))
                                    <span class="wak-feedback">
                                        <strong>{{ $errors->first('no_fax') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sk" class="col-md-4 col-form-label text-md-right">{{ __('Surat Keputusan') }}</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control" name="sk" required>
                                
                                @if ($errors->has('sk'))
                                    <span class="wak-feedback">
                                        <strong>{{ $errors->first('sk') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sk_izin" class="col-md-4 col-form-label text-md-right">{{ __('Surat Keputusan Izin') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="sk_izin" required value="{{old('sk_izin')}}">
                                
                                @if ($errors->has('sk_izin'))
                                    <span class="wak-feedback">
                                        <strong>{{ $errors->first('sk_izin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tgl_sk" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Surat Keputusan') }}</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" name="tgl_sk" required value="{{old('tgl_sk')}}">
                                
                                @if ($errors->has('tgl_sk'))
                                    <span class="wak-feedback">
                                        <strong>{{ $errors->first('tgl_sk') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_wajib_pajak" class="col-md-4 col-form-label text-md-right">{{ __('Nama Wajib Pajak') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama_wajib_pajak" required value="{{old('nama_wajib_pajak')}}">
                                
                                @if ($errors->has('nama_wajib_pajak'))
                                    <span class="wak-feedback">
                                        <strong>{{ $errors->first('nama_wajib_pajak') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="npwp" class="col-md-4 col-form-label text-md-right">{{ __('NPWP') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="npwp" required value="{{old('npwp')}}">
                                
                                @if ($errors->has('npwp'))
                                    <span class="wak-feedback">
                                        <strong>{{ $errors->first('npwp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="akses_internet" class="col-md-4 col-form-label text-md-right">{{ __('Akses Internet') }}</label>

                            <div class="col-md-6">
                                <select class="form-control show-tick" name="akses_internet">
                                    <option value="" disabled selected>Akses Internet ?</option>
                                    <option value="Ya" {{(old('akses_internet')=='Ya') ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{(old('akses_internet')=='Tidak') ? 'selected' : '' }}>Tidak</option>
                                </select>
                                
                                @if ($errors->has('akses_internet'))
                                    <span class="wak-feedback">
                                        <strong>{{ $errors->first('akses_internet') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="maps" class="col-md-4 col-form-label text-md-right">{{ __('Script MAPS') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="maps" required value="{{old('maps')}}">
                                
                                @if ($errors->has('maps'))
                                    <span class="wak-feedback">
                                        <strong>{{ $errors->first('maps') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sertifikasi_iso" class="col-md-4 col-form-label text-md-right">{{ __('Sertifikasi Iso') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="sertifikasi_iso" required value="{{old('sertifikasi_iso')}}">
                                
                                @if ($errors->has('sertifikasi_iso'))
                                    <span class="wak-feedback">
                                        <strong>{{ $errors->first('sertifikasi_iso') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kepala_sekolah" class="col-md-4 col-form-label text-md-right">{{ __('Kepala Sekolah') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="kepala_sekolah" required value="{{old('kepala_sekolah')}}">
                                
                                @if ($errors->has('kepala_sekolah'))
                                    <span class="wak-feedback">
                                        <strong>{{ $errors->first('kepala_sekolah') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="akriditasi" class="col-md-4 col-form-label text-md-right">{{ __('Status Akriditasi') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="akriditasi" required value="{{old('akriditasi')}}">
                                
                                @if ($errors->has('akriditasi'))
                                    <span class="wak-feedback">
                                        <strong>{{ $errors->first('akriditasi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="menerima_bos" class="col-md-4 col-form-label text-md-right">{{ __('Bersedia Menerima BOS ?') }}</label>

                            <div class="col-md-6">
                                <select class="form-control show-tick" name="menerima_bos">
                                    <option value="" selected disabled>Bersedia Menerima BOS ?</option>
                                    <option value="Ya" {{(old('menerima_bos')=='Ya') ? 'selected' : '' }}>Bersedia Menerima BOS</option>
                                    <option value="Tidak" {{(old('menerima_bos')=='Tidak') ? 'selected' : '' }}>Tidak Menerima BOS</option>
                                </select>

                                @if ($errors->has('menerima_bos'))
                                    <span class="wak-feedback">
                                        <strong>{{ $errors->first('menerima_bos') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="website" class="col-md-4 col-form-label text-md-right">{{ __('URL Website ?') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="website" required value="{{old('website')}}">
                                
                                @if ($errors->has('website'))
                                    <span class="wak-feedback">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status_kepemilikan" class="col-md-4 col-form-label text-md-right">{{ __('Status Kepemilikan Sekolah') }}</label>

                            <div class="col-md-6">
                                <select class="form-control show-tick" name="status_kepemilikan">
                                    <option value="" disabled selected>Status Kepemilikan</option>
                                    <option value="Negeri" {{(old('status_kepemilikan')=='Negeri') ? 'selected' : '' }}>Negeri</option>
                                    <option value="Yayasan" {{(old('status_kepemilikan')=='Yayasan') ? 'selected' : '' }}>Yayasan</option>
                                    <option value="Swasta" {{(old('status_kepemilikan')=='Swasta') ? 'selected' : '' }}>Swasta</option>
                                </select>

                                @if ($errors->has('status_kepemilikan'))
                                    <span class="wak-feedback">
                                        <strong>{{ $errors->first('status_kepemilikan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="luastanah_milik" class="col-md-4 col-form-label text-md-right">{{ __('Luas Tanah Milik') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="luastanah_milik" required value="{{old('luastanah_milik')}}">
                                

                                @if ($errors->has('luastanah_milik'))
                                    <span class="wak-feedback">
                                        <strong>{{ $errors->first('luastanah_milik') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="luastanah_bukan" class="col-md-4 col-form-label text-md-right">{{ __('Luas Tanah Bukan Milik') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="luastanah_bukan" required value="{{old('luastanah_bukan')}}">

                                @if ($errors->has('luastanah_bukan'))
                                    <span class="wak-feedback">
                                        <strong>{{ $errors->first('luastanah_bukan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sumber_listrik" class="col-md-4 col-form-label text-md-right">{{ __('Sumber Listrik') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="sumber_listrik" required value="{{old('sumber_listrik')}}">

                                @if ($errors->has('sumber_listrik'))
                                    <span class="wak-feedback">
                                        <strong>{{ $errors->first('sumber_listrik') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="daya_listrik" class="col-md-4 col-form-label text-md-right">{{ __('Daya Listrik') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="daya_listrik" required value="{{old('daya_listrik')}}">

                                @if ($errors->has('daya_listrik'))
                                    <span class="wak-feedback">
                                        <strong>{{ $errors->first('daya_listrik') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" value="121212" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="121212" required>
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
