@extends($template)

@section('content')

<div class="nav-scroller bg-white box-shadow">
   <ul class="nav nav-underline" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" href="{{url($auth.'/album/'.$id)}}">{{$album->nama}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url($auth.'/album/edit/'.$id)}}">Update</a>
        </li>
    </ul>
</div>

<br><br>
@if(Session::has('success'))
  <div class="alert alert-info alert-dismissable">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      {{ Session::get('success') }}
  </div>
@endif

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">{{$album->nama}}</h1>
          <p class="lead text-muted">{{$album->deskripsi}}</p>
          <small>{{$album->tgl_kegiatan}}</small>
          <p>
            <button type="button" class="btn btn-success my-2" data-toggle="modal" data-target="#exampleModal">Tambah Foto</button>
            <button type="button" class="btn btn-danger my-2" data-toggle="modal" data-target="#exampleModal2">Hapus</button>
          </p>
        </div>
      </section>

      <div class="album py-5">
        <div class="container">

          <div class="row">
            @foreach($fotos as $foto)
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="{{url('http://file.smawahasmodel.sch.id/album/'.$foto->foto)}}" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">{{$foto->caption}}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <form method="POST" action="{{url('layanan/foto/'.$foto->id)}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                      <div class="btn-group">
                        <a href="{{url('images/album/'.$foto->foto)}}" class="btn btn-sm btn-outline-success">View</a>
                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#exampleModalupdate"
                        data-id="{{$foto->id}}" 
                        data-caption="{{$foto->caption}}" 
                        >Update</button>
                              <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                      </div>
                    </form>
                    <small class="text-muted">{{$foto->updated_at->diffForHumans()}}</small>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>

    </main>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Foto </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('foto.tambah') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="id_album" value="{{$id}}">
        <input type="hidden" name="status_user" value="{{$auth}}">
        <input type="hidden" name="id_user" value="{{$id_auth}}">
      <input type="hidden" name="id" id="id">
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Foto</label>
             <input id="nama" type="file" class="form-control{{ $errors->has('foto') ? ' is-invalid' : '' }}" name="foto[]" multiple required autofocus>
                @if ($errors->has('foto'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('foto') }}</strong>
                    </span>
                @endif
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Caption</label>
            <input id="caption" type="text" class="form-control{{ $errors->has('caption') ? ' is-invalid' : '' }}" name="caption" value="{{old('caption')}}" required autofocus>
                @if ($errors->has('caption'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('caption') }}</strong>
                    </span>
                @endif
          </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Foto</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Foto </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ url('layanan/album/'.$id) }}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
      <input type="hidden" name="id" id="id">
      <div class="modal-body">
        Apakah anda yakin ingin menghapus album ini
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Hapus Album dan Semua Foto</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModalupdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Foto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('foto.update') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
      <input type="hidden" name="id" id="id">
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Foto</label>
             <input id="nama" type="file" class="form-control{{ $errors->has('foto') ? ' is-invalid' : '' }}" name="foto" required autofocus>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Keterangan / Caption</label>
            <input type="text" class="form-control" name="caption" id="caption">
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
  $('#exampleModalupdate').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var caption = button.data('caption');
    var modal = $(this);
    console.log(id);
    modal.find('#caption').val(caption)
    modal.find('#id').val(id)
  })
</script>
@endsection
