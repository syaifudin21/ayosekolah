@extends('pengurus.template-pengurus')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
<h1 class="h2">Siswa Baru</h1>
<div class="btn-toolbar mb-2 mb-md-0">
  <div class="btn-group mr-2">
    <a class="btn btn-sm btn-outline-secondary" href="{{url('pengurus/siswabaru/pengumuman')}}">Tambah Pengurmuman</a>
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
                <th>No Pndf</th>
                <th>Nama</th>
                <th>Nilai</th>
                <th>Kelas</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php $n=1;?>
        <tbody>
            @foreach($siswas as $siswa)
            <tr>
                <td>{{$n++}}</td>
                <td>{{$siswa->id}}</td>
                <td>{{$siswa->nama_lengkap}}</td>
                <td>{{$siswa->nilai_test}}</td>
                <td>{{$siswa->diterima_dikelas}}</td>
                <td><a href="{{url('pengurus/siswabaru/'.$siswa->id)}}" class="btn btn-outline-success btn-sm">Lihat</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </div>

</div>
@endsection

@section('script')
<script type="text/javascript">
    $('#example').DataTable();
</script>
@endsection
