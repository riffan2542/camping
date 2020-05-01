@extends('admin.main')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card-header bg-dark py-3">
          <h5 class="m-0 font-weight-bold text-white">{{ __('Stock Of Goods Data')}}
          <a href="{{ route('stokbarang.create') }}" type="button" class="btn btn-success btn float-right">
          <i class="fas fa-plus"></i> Plus</a>
          </h5>
          </form>
        </div>
        <!-- <div class="card-header bg-dark py-3">
          <form action="{{ route('stokbarang.index') }}" method="get">
          <h5 class="m-0 font-weight-bold text-white">{{ __('Return Data')}}
          <button type="button" class="btn btn-success btn float-right" data-toggle="modal" 
          data-target="#modal-lg"><i class="fas fa-plus"></i> Plus</button>
          </h5>
          </form>
        </div> -->
            <div class="card">
                <!-- <div class="card-header">Stokbarang</div>
                <center>
                    <br>
                    <a href="{{ route('stokbarang.create') }}" class="btn btn-outline-primary">Tambah</a>
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
                  <th>Code</th>
                  <th>Photo</th>
                  <th>Category</th>
                  <th>Name</th>
                  <th>Price Of Goods</th>
                  <th>Stock Of Goods</th>
                  <th width="20%">Action</th>
                </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($stokbarang as $data)
                    <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->kode }}</td>
                    <td><img src="{{ asset('assets/img/fotobarang/'.$data->foto) }}" alt="" height="100px" width="100px"></td>
                    <td>{{ $data->kategori->kategori_nama }}</td>
                    <td>{{ $data->barang_nama }}</td>
                    <td>{{ $data->harga_barang }}</td>
                    <td>{{ $data->barang_jumlah }}</td>
                        <td><a href="{{ route('stokbarang.edit', $data->id) }}" class="btn btn-warning">
                        <i class="nav-icon fas fa-edit"></i> Edit</a>
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
              <form action="{{ route('stokbarang.destroy', $data->id) }}" method="POST">
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
