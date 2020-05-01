@extends('admin.main')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card-header bg-dark py-3">
          <h5 class="m-0 font-weight-bold text-white">{{ __('Transaction Data')}}
          <a href="{{ route('transaksi.create') }}" type="button" class="btn btn-success btn float-right">
          <i class="fas fa-plus"></i> Plus</a>
          </h5>
          </form>
        </div>
            <div class="card">
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
                <th>Admin Name</th>
                <th width="20%">Name Of Goods</th>
                <th>The Amount Of Goods</th>
                <th>Total Price</th>
                <th width="16%">Return Date Details</th>
                <th width="25%">Action</th>
                </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp   
                @foreach ($transaksi as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->nama_admin }}</td>    
                        <td>
                            <ol>
                                @foreach ($data->stokbarang as $item)
                                <ul>
                                <li>
                                {{ $item->barang_nama }}
                                </li></ul>
                                @endforeach
                            </ol>
                        </td>
                        <td>{{ $data->jumlah_barang }}</td>
                        <td>{{ $data->total_harga }}</td>
                        <td>{{ $data->pengembalian->detail_tgl_kembali }}</td>
                        <!-- <td><a href="{{ route('transaksi.edit', $data->id) }}" class="btn btn sm btn-danger" data-target=".modal-{{$data->id}}" data-toggle="modal">Edit</a></td> -->
                        
                        <td><a href="{{ route('transaksi.edit', $data->id) }}" class="btn btn-warning"><i class="nav-icon fas fa-edit"></i> Edit</a>
                            <a href="{{ route('transaksi.show', $data->id) }}" class="btn btn-info">Show</a>
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
              <form action="{{ route('transaksi.destroy', $data->id) }}" method="POST">
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

