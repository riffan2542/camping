@extends('admin.index')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">transaksi</div>
                <center>
                    <br>
                    <a href="{{ route('transaksi.create') }}" class="btn btn-primary">Tambah</a>
                </center>
                @if (session('status'))
                        <div  class="alert alert-success alert-block" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="table-responsive">  
                    <br>
                    <table class="table" >
                        <tr>
                            <th>No</th>
                            <th>Nama Admin</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Total Harga</th>
                            <th>Detail Tanggal Kembali</th>
                            <th colspan="3" style="text-align:center;">Action</th>
                        </tr>
                        @php $no = 1; @endphp   
                        @foreach ($transaksi as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->nama_admin }}</td>
                                <td>{{ $data->nama_barang }}</td>
                                <td>{{ $data->stokbarang->barang_jumlah }}</td>
                                <td>{{ $data->total_harga }}</td>
                                <td>{{ $data->pengembalian->detail_tgl_kembali }}</td>
                                <td><a href="{{ route('transaksi.edit', $data->id) }}" class="btn btn sm btn-danger">Edit</a></td>
                                <td><a href="{{ route('transaksi.show', $data->id) }}" class="btn btn sm btn-warning">Detail data</a></td>
                                <td>
                                    <form action="{{ route('transaksi.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn sm btn-success" type="submit">Hapus Data</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
