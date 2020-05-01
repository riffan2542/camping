@extends('admin.main')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <div class="card-header bg-dark py-3">
          <form action="{{ route('pengembalian.index') }}" method="get">
          <h5 class="m-0 font-weight-bold text-white">{{ __('Return Data')}}
          <button type="button" class="btn btn-success btn float-right" data-toggle="modal" 
          data-target="#modal-lg"><i class="fas fa-plus"></i> Plus</button>
          </h5>
          </form>
        </div>
            <!-- <div class="card">
                <div class="card-header">Pengembalian</div>
                <center>
                    <br>
                    <a href="{{ route('pengembalian.create') }}" class="btn btn-outline-info" 
                    data-toggle="modal" data-target="#modal-lg">Tambah</a>
                </center> -->
                @if (session('status'))
                        <div  class="alert alert-danger alert-block" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="table-responsive">  
                <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Detail Tanggal Kembali</th>
                    <th>Kondisi Barang</th>
                    <th>Detail Denda</th>
                    <th width="25%">Action</th>
                </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp   
                        @foreach ($pengembalian as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->detail_tgl_kembali }}</td>
                                <td>{{ $data->kondisi_barang }}</td>
                                <td>{{ $data->detail_denda }}</td>
                                <td><a href="{{ route('pengembalian.edit', $data->id) }}" class="btn btn-warning"><i class="nav-icon fas fa-edit"></i> Edit</a>
                                   <button class="btn btn-danger" type="submit" data-toggle="modal" data-target="#modal-lg1"><i class="fa fa-trash"></i> Delete</button>
                                </td>
                            </tr>
                        @endforeach
                </tbody>
              </table>  
              @include('sweetalert::alert')
                </div>
            </div>
        </div>
    </div>
</div>
  <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <div class="header bg-dark">
            <div class="modal-header">
              <h4 class="modal-title">Add Return Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
            </div>
            <div class="card-body">
                <form action="{{ route('pengembalian.store') }}" method="post">
                    @csrf
            <div class="form-group">
              <label for="">Return Date Details</label>
              <input type="date" name="detail_tgl_kembali" id="" class="form-control" placeholder="fill in the return date details" aria-describedby="helpId" required>
            </div>
            <div class="form-group">
              <label for="">Condition Of Goods</label>
              <input type="text" name="kondisi_barang" id="" class="form-control" placeholder="fill the condition of the goods" aria-describedby="helpId" required>
            </div>
            <div class="form-group">
              <label for="">Fine Details</label>
              <input type="number" name="detail_denda" id="" class="form-control" placeholder="fill in the fine details" aria-describedby="helpId" required>
            </div>
            <div class="modal-footer">
      <button type="submit" class="btn btn-dark"><i class="fas fa-plus"></i> Save Data</button>
      </div>
                </form>
                        </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="modal-lg1">
        <div class="modal-dialog modal-lg">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
          <div class="modal-content">
          <div class="header bg-dark">
            <div class="modal-header">
              <h4 class="modal-title">Do You Really Want To Delete This Return?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
              <form action="{{ route('pengembalian.destroy', $data->id) }}" method="POST">
                  @csrf
                  <input type="hidden" name="_method" value="DELETE">
                  <button class="btn btn-dark" type="submit"><i class="fa fa-trash-alt"> Delete</i></button>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
@endsection
