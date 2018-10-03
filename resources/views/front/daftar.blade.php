@extends('front.template')
@section('warna','blue')
@section('title')
<div class="nav-header center">
  <h1>Pendaftaran Online</h1>
  <div class="tagline">Mengutamakan <span class="element"></span> </div>
</div>
@endsection

@section('background', asset('images/standar/banner1.jpg'))

@section('css')
@endsection

@section('menu')
<div class="categories-wrapper blue darken-3">
  <div class="categories-container">
    <ul class="categories container">
      <li class="active"> Form Pendaftaran Siswa Baru </a></li>
      <li><a href="{{url('alur-pendaftaran-online')}}">Alur Pendaftaran Online</a></li>
      <li><a href="{{url('brosur')}}">Brosur</a></li>
      <li><a href="{{url('tatatertib')}}">Tata Tertib Sekolah</a></li>
      <li><a href="{{url('hasil-seleksi')}}">Hasil Seleksi</a></li>
    </ul>
  </div>
</div>
@endsection

@section('content')
<div id="portfolio" class="section white">
  <div class="container ">

    <h3>Syarat Dan Ketentuan</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <div class="row">
      <div class="col s12">
        <h5>Keterangan Siswa</h5>
      </div>
    </div>
    <div class="row">
      <form class="col s12" accept="{{route('siswa.baru')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
      <div class="row">
        <div class="input-field col m5 s12">
          <input id="first_name" type="text" class="validate" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required>
          <label for="first_name">Nama Lengkap</label>
           {{-- @if ($errors->has('nama_lengkap'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('nama_lengkap') }}</strong>
                </span>
            @endif --}}
        </div>
        <div class="input-field col m4 s12">
          <input id="tgl" type="text" class="validate" name="tgl" value="{{ old('tgl') }}">
          <label for="tgl">Tempat, Tanggal Lahir</label>
        </div>
        <div class="input-field col m3 s12">
          <input id="nim" type="number" class="validate" name="nim" value="{{ old('nim') }}">
          <label for="nim">Nomor Induk Siswa Nasiona</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col m3 s12">
            <select name="jk">
              <option value="" disabled selected>Pilih </option>
              <option value="Laki-laki">Laki-Laki </option>
              <option value="Perempuan">Perempuan</option>
            </select>
            <label>Jenis Kelamin</label>
        </div>
        <div class="input-field col m3 s12">
            <select name="agama">
              <option value="" disabled selected>Pilih </option>
              <option value="Islam">Islam</option>
              <option value="Protestan">Protestan</option>
              <option value="Katolik">Katolik</option>
              <option value="Hindu">Hindu</option>
              <option value="Budha">Budha</option>
              <option value="Kong Hu Cu">Kong Hu Cu</option>
            </select>
            <label>Agama</label>
        </div>
        <div class="input-field col m3 s6">
          <input id="tinggi" type="number" class="validate" name="tinggi" value="{{ old('tinggi') }}">
          <label for="tinggi">Tinggi</label>
        </div>
        <div class="input-field col m3 s6">
          <input id="last_name" type="number" class="validate" name="berat" value="{{ old('berat') }}">
          <label for="last_name">Berat</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col m4 s12">
          <input id="hp" type="number" class="validate" name="nomor_hp" value="{{ old('nomor_hp') }}">
          <label for="hp">Nomor Hp</label>
        </div>
        <div class="input-field col m4 s12">
          <input id="jalan" type="text" class="validate" name="jln" value="{{ old('jln') }}">
          <label for="jalan">Jalan</label>
        </div>
        <div class="input-field col m2 s6">
          <input id="rt" type="number" class="validate" name="rt" value="{{ old('rt') }}">
          <label for="rt">RT</label>
        </div>
        <div class="input-field col m2 s6">
          <input id="rw" type="number" class="validate" name="rw" value="{{ old('rw') }}">
          <label for="rw">RW</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col m3 s12">
          <input id="dusun" type="text" class="validate" name="Dusun" value="{{ old('Dusun') }}">
          <label for="dusun">Dusun</label>
        </div>
        <div class="input-field col m3 s12">
          <input id="desa" type="text" class="validate" name="Desa" value="{{ old('Desa') }}">
          <label for="desa">Desa</label>
        </div>
        <div class="input-field col m3 s12">
          <input id="Kecamatan" type="text" class="validate" name="Kecamatan" value="{{ old('Kecamatan') }}">
          <label for="Kecamatan">Kecamatan</label>
        </div>
        <div class="input-field col m3 s12">
          <input id="Kabupaten" type="text" class="validate" name="Kabupaten" value="{{ old('Kabupaten') }}">
          <label for="Kabupaten">Kabupaten</label>
        </div>
      </div>
      <div class="row">
          <div class="input-field col m3 s12">
            <select name="tinggal">
              <option value="" disabled selected>Pilih </option>
              <option value="Orang Tua">Orang Tua</option>
              <option value="Kost">Kost</option>
              <option value="Asrama">Asrama</option>
              <option value="Lainnya">Lainnya</option>
            </select>
            <label>Tinggal Bersama</label>
          </div>
          <div class="input-field col m3 s12">
            <select name="transportasi">
              <option value="" disabled selected>Pilih </option>
              <option value="Sepeda Motor">Sepeda Motor</option>
              <option value="Jalan Kaki">Jalan Kaki</option>
              <option value="Transportasi Umum">Transportasi Umum</option>
              <option value="Lainnya">Lainnya</option>
            </select>
            <label>Transportasi ke Sekolah</label>
          </div>
          <div class="input-field col m3 s12">
            <input id="tempu" type="text" class="validate" name="tempu_sekolah" value="{{ old('tempu_sekolah') }}">
            <label for="tempu">Waktu Tempu ke Sekolah</label>
          </div>
          <div class="input-field col m3 s12">
            <input id="jarak" type="text" class="validate" name="jarak_sekolah" value="{{ old('jarak_sekolah') }}">
            <label for="jarak">Jarak ke Sekolah</label>
          </div>
        </div>
        <div class="row">
          <div class="col s12">
            <h5>Keterangan Orang Tua</h5>
          </div>
        </div>
        <div class="row">
          <div class="input-field col m3 s12">
            <input id="nama_ayah" type="text" class="validate" name="nama_ayah" value="{{ old('nama_ayah') }}">
            <label for="nama_ayah">Nama Ayah</label>
          </div>
          <div class="input-field col m3 s12">
            <input id="tgl_ayah" type="text" class="validate" name="tgl_ayah" value="{{ old('tgl_ayah') }}">
            <label for="tgl_ayah">Tempat Tanggal Lahir Ayah</label>
          </div>
          <div class="input-field col m2 s12">
            <input id="pekerjaan_ayah" type="text" class="validate" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}">
            <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
          </div>
          <div class="input-field col m2 s12">
            <input id="pendidikan_ayah" type="text" class="validate" name="pendidikan_ayah" value="{{ old('pendidikan_ayah') }}">
            <label for="pendidikan_ayah">Pendidikan Terakhir</label>
          </div>
          <div class="input-field col m2 s12">
            <input type="checkbox" class="filled-in" id="filled-in-box" name="keterangan_ayah" value="Hidup" checked="checked"/>
            <label for="filled-in-box">Masih Hidup</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col m3 s12">
            <input id="nama_ibu" type="text" class="validate" name="nama_ibu" value="{{ old('nama_ibu') }}">
            <label for="nama_ibu">Nama Ibu</label>
          </div>
          <div class="input-field col m3 s12">
            <input id="tgl_ayah" type="text" class="validate" name="tgl_ibu" value="{{ old('tgl_ibu') }}">
            <label for="tgl_ibu">Tempat Tanggal Lahir Ibu</label>
          </div>
          <div class="input-field col m2 s12">
            <input id="pekerjaan_ibu" type="text" class="validate" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}">
            <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
          </div>
          <div class="input-field col m2 s12">
            <input id="pendidikan_ibu" type="text" class="validate" name="pendidikan_ibu" value="{{ old('pendidikan_ibu') }}">
            <label for="pendidikan_ibu">Pendidikan Terakhir</label>
          </div>
          <div class="input-field col m2 s12">
            <input type="checkbox" class="filled-in" id="filled-in-box" name="keterangan_ibu" value="Hidup" checked="checked"/>
            <label for="filled-in-box">Masih Hidup</label>
          </div>
        </div>

        <div class="row">
        <div class="input-field col m4 s12">
          <input id="nomor_hp_ortu" type="number" class="validate" name="nomor_hp_ortu" value="{{ old('nomor_hp_ortu') }}">
          <label for="nomor_hp_ortu">Nomor Hp Orang Tua</label>
        </div>
        <div class="input-field col m4 s12">
          <input id="ortu_jln" type="text" class="validate" name="ortu_jln" value="{{ old('ortu_jln') }}">
          <label for="ortu_jln">Jalan</label>
        </div>
        <div class="input-field col m2 s6">
          <input id="ortu_rt" type="number" class="validate" name="ortu_rt" value="{{ old('ortu_rt') }}">
          <label for="ortu_rt">RT</label>
        </div>
        <div class="input-field col m2 s6">
          <input id="ortu_rw" type="number" class="validate" name="ortu_rw" value="{{ old('ortu_rw') }}">
          <label for="ortu_rw">RW</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col m3 s12">
          <input id="ortu_dusun" type="text" class="validate" name="ortu_dusun" value="{{ old('ortu_dusun') }}">
          <label for="ortu_dusun">Dusun Orang Tua</label>
        </div>
        <div class="input-field col m3 s12">
          <input id="ortu_desa" type="text" class="validate" name="ortu_desa" value="{{ old('ortu_desa') }}">
          <label for="ortu_desa">Desa Orang Tua</label>
        </div>
        <div class="input-field col m3 s12">
          <input id="ortu_kecamatan" type="text" class="validate" name="ortu_kecamatan" value="{{ old('ortu_kecamatan') }}">
          <label for="ortu_kecamatan">Kecamatan Orang Tua</label>
        </div>
        <div class="input-field col m3 s12">
          <input id="ortu_kabupaten" type="text" class="validate" name="ortu_kabupaten" value="{{ old('ortu_kabupaten') }}">
          <label for="ortu_kabupaten">Kabupaten Orang Tua</label>
        </div>
      </div>


        <div class="row">
          <div class="col s12">
            <h5>Keterangan Sekolah Asal</h5>
          </div>
        </div>
        <div class="row">
          <div class="input-field col m4 s12">
            <input id="sekolah_asal" type="text" class="validate" name="sekolah_asal" value="{{ old('sekolah_asal') }}">
            <label for="sekolah_asal">Nama Sekolah Sebelumnya (SMP Sederajat)</label>
          </div>
          <div class="input-field col m5 s12">
            <input id="sekolah_alamat" type="text" class="validate" name="sekolah_alamat" value="{{ old('sekolah_alamat') }}">
            <label for="sekolah_alamat">Alamat Sekolah SMP</label>
          </div>
          <div class="input-field col m3 s12">
              <select name="sekolah_angkatan">
                @foreach($tampil as $th)
                <option value="{{$th}}">{{$th}}</option>
                @endforeach
              </select>
              <label>Angkatan / Tahun Lulus SMP </label>
          </div>
        </div>

        <div class="row">
          <div class="col s12">
            <h5>Lampiran</h5>
          </div>
        </div>
        <div class="row">
          <div class="col m2 s12 valign-wrapper">
            <img class="materialboxed" width="100%" id="foto">
          </div>
          <div class="col m4 s12">
             <div class="file-field input-field">
                <div class="btn btn-flat">
                  <span>Foto</span>
                  <input type="file" name="foto" onchange="fotoURl(this)" value="{{ old('foto') }}" multiple>
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" placeholder="Upload Foto">
                </div>
              </div>
          </div>
          <div class="col m2 s12 valign-wrapper">
            <img class="materialboxed" width="100%" id="ijazah">
          </div>
          <div class="col m4 s12">
            <div class="file-field input-field">
              <div class="btn btn-flat">
                <span>Ijazah</span>
                <input type="file" name="ijazah"  onchange="fileijazah(this)" multiple>
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Upload Ijazah / Raport Smt 1-5" value="{{ old('ijazah') }}">
              </div>
            </div>
          </div>
      </div>

      <br><br><br>
      <div class="row">
        <div class="col s8">
          <input type="checkbox" class="filled-in" id="menerima" required />
            <label for="menerima">Saya Menerima Persyaratan dan Ketentuan</label>
        </div>
          <button class="btn light-blue darken-3 col s4" type="submit">Daftar
              <i class="material-icons right">send</i>
          </button>
      </div>
      </div>
    </form>
    </div>
  </div>  
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{asset('js/typed.min.js')}}"></script>
<script type="text/javascript">
  function fotoURl(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#foto').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
  }
  function fileijazah(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#ijazah').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
  }

  document.addEventListener("DOMContentLoaded", function() {
          new Typed('.element', {
          cursorChar: '|',
          strings: ["Menciptakan Dunia dalam Genggaman.", "Membantu dan Menghubungkan Guru dan Siswa", "Memudahkan Pengawasan Perkembangan Siswa"],
          startDelay: 1000,
          showCursor: true,
          autoInsertCss: true,
          backDelay: 2000,
          typeSpeed: 100,
          backSpeed: 20,
          // smartBackspace: false, // this is a default
          loop: true
        });
    });
  $(document).ready(function() {
    @if(Session::has('berhasil'))
      Materialize.toast('{{ Session::get('berhasil') }}', 4000);
    @endif
    $('.materialboxed').materialbox();
    Materialize.updateTextFields();
    $('textarea#textarea1').characterCounter();
    $('select').material_select();
  });

</script>
@endsection