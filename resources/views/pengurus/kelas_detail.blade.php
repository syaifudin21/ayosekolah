@extends('pengurus.template-pengurus')

@section('content')

<div class="nav-scroller bg-white box-shadow">
   <ul class="nav nav-underline" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" href="{{url('/pengurus/kelas/lihat/'.$id)}}">{{$kelasid->nama_kelas}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/pengurus/kelas/update/'.$id)}}">Update</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/pengurus/kelas/mapel/'.$id)}}">Tambah Mapel</a>
        </li>
    </ul>
</div>

<br><br>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
<h1 class="h2">Kelas {{$kelasid->nama_kelas}}</h1>
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
    <li class="breadcrumb-item"><a href="{{url('pengurus/kelas')}}">Kelas</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$kelasid->nama_kelas}}</li>
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
    <tr><td width="30%">Nama Kelas</td><td><b>{{$kelasid->nama_kelas}}</b></td></tr>
    <tr><td>Wali Kelas</td><td><b>{{$kelasid->nama}}</b></td></tr>
    <tr><td>Tahun Ajaran</td><td><b>{{$kelasid->tahun_ajaran}}</b></td></tr>
    <tr><td>Total Siswa</td><td><b>40</b></td></tr>
    <tr><td>Total Mapel</td><td><b>{{count($kelasmapel)}}</b></td></tr>
</table>

<div class="d-flex">
  <div class="p-2">
<h1 class="h3">Mata Pelajaran</h1>
  </div>
  <div class="ml-auto p-2">
    <div class="dropdown">
      <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span data-feather="clipboard"></span> Load Data Kelas
      </button>
      <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#load" data-ket="Tambah dan Load Data">Tambah dan Load Data</a>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#load" data-ket="Hapus dan Load Data">Hapus dan Load Data</a>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#load" data-ket="Hapus Semua Mapel">Hapus Semua Mapel</a>
      </div>
    </div>
    {{-- <button class="btn btn-sm btn-outline-secondary">Tambah dan Load Data Keals Lain</button> --}}
</div>
</div>
<table class="table table-sm table-hover">
          <thead>
            <tr>
                <th>Nama Mata Pelajaran</th>
                <th class="text-center">Jumlah Jam</th>
                <th class="text-center">Pembimbing</th>
                <th></th>
            </tr>
          </thead>
        @foreach($kelasmapel as $kelasmapel)
            <tr>
                <td> {{$kelasmapel->mapel}} </td>
                <center>
                <td class="text-center"> {{$kelasmapel->jam}} </td>
                <td class="text-center"> <?php $nama = App\Models\Pengajar::find($kelasmapel->id_guru);?>
                    @if($nama != null)
                    {{$nama->nama}} 
                    @else
                    @endif
                </td>
                <form method="POST" action="{{url('pengurus/kelas/mapel/delete/'.$kelasmapel->id)}}">
                <td  class="text-center">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    
                    <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModal"
                    data-id="{{$kelasmapel->id}}" 
                    data-nama_mapel="{{$kelasmapel->mapel}}" 
                    data-id_mapel="{{$kelasmapel->id}}"
                    @if($nama != null)
                    data-nama="{{$nama->name}}"
                    @endif
                    data-id_guru="{{$kelasmapel->id_guru}}"
                    data-jam="{{$kelasmapel->jam}}"
                    >Update</button>

                    <button type="submit" class="btn btn-outline-secondary btn-sm"><i class="fa fa-trash"></i> Delete </button>
                </td>
                </form>
            </tr>
        @endforeach
        </table>
</div>
    </div>

</div>

<div class="modal fade" id="load" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('loadmapel.tambah') }}">
        {{ csrf_field() }}
      <input type="hidden" name="id" id="id">
      <input type="hidden" name="kelas" value="{{$id}}">
      <input type="hidden" id="lempar" name="action">
      <div class="modal-body">
          <div class="form-group">
              <label for="recipient-name" class="col-form-label">Tahun Ajaran</label>
              <select id="pilihta" class="form-control" name="id_ta">
                  <option>Pilih Tahun Ajaran</option>
                  @foreach($ta as $ta)
                  <option value="{{$ta->id}}">{{$ta->tahun_ajaran}}</option>
                  @endforeach
              </select>
          </div>
           <div class="form-group">
              <label for="recipient-name" class="col-form-label">Kelas</label>
              <select id="semuakelas" class="form-control" name="id_kelas">
              </select>
          </div>

          <table class="table table-hover table-sm">
              <thead>
                  <tr><td><b>Nama Mapel</b></td></tr>
              </thead>
              <tbody id="mapelkelas">
              </tbody>
          </table>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="action" class="btn btn-primary"></button>
      </div>
      </form>
    </div>
  </div>
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('kelasmapel.update') }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
      <input type="hidden" name="id" id="id">
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Mata Pelajaran</label>
            <input type="text"  readonly class="form-control" id="mapel">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Jumlah Jam</label>
            <input id="jam" type="text" class="form-control" name="jam" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Pembimbing</label>
              <select id="guru" class="form-control" name="id_guru">
              </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
      $(document).ready(function(){
          $('#pilihta').on('change', function(e){
              var id = e.target.value;
              $.get('{{ url('tu/ta/load')}}/'+id, function(data){
                  console.log(id);
                  console.log(data);
                  $('#semuakelas').empty();
                  $('#semuakelas').append("<option>Pilih Kelas</option>");
                  $.each(data, function(index, element){
                      $('#semuakelas').append("<option value=" +element.id+ ">" +element.nama_kelas+"</option>");
                  });
              });
          });
      });
      $(document).ready(function(){
          $('#semuakelas').on('change', function(e){
              var id = e.target.value;
              $.get('{{ url('tu/kelas/load')}}/'+id, function(data){
                  console.log(id);
                  console.log(data);
                  $('#mapelkelas').empty();
                  $.each(data, function(index, element){
                      $('#mapelkelas').append("<tr><td>"+element.mapel+"</td></tr>");
                  });
              });
          });
      });
      $('#load').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var ket = button.data('ket') 
          var modal = $(this)

          modal.find('.modal-title').text(ket)
          modal.find('#action').text(ket)
          modal.find('#lempar').val(ket)
          
        })
      $('#exampleModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget);
          var id = button.data('id');
          var id_mapel = button.data('id_mapel');
          var id_guru = button.data('id_guru');
          var nama = button.data('nama');
          var nama_mapel = button.data('nama_mapel');
          var jam = button.data('jam');
          var modal = $(this);
          
          $('#guru').empty();
          $.get('{{ url('pengurus/data/pengajar')}}', function(data){
            $.each(data, function(index, element){

              if (element.id == id_guru) { var select = 'selected';} else { var select = '';}
                 modal.find('#guru').append("<option value=" + element.id + " "+ select +" >" + element.nama +"</option>");
            });
          });
          modal.find('#mapel').val(nama_mapel)
          modal.find('#jam').val(jam)
          modal.find('#id').val(id)
          
        })
</script>
@endsection
