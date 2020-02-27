@extends('admin.index')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pemesanan</div>
                <center>
                    <br>
                    <a href="{{ route('pemesanan.create') }}" class="btn btn-primary">Tambah</a>
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
                            <th>kode</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Foto Barang</th>
                            <th>Jumlah Barang</th>
                            <th colspan="3" style="text-align:center;">Action</th>
                        </tr>
                        @php $no = 1; @endphp   
                        @foreach ($pemesanan as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->kode }}</td>
                                <td>{{ $data->nama_barang }}</td>
                                <td>{{ $data->kategori->kategori_nama }}</td>
                                <td><img src="{{ asset('assets/img/fotobarang/'.$data->foto) }}" alt="" height="100px" width="100px"></td>
                                <td>{{ $data->jumlah_barang }}</td>
                                <td><a href="{{ route('pemesanan.edit', $data->id) }}" class="btn btn sm btn-danger">Edit</a></td>
                                <td><a href="{{ route('pemesanan.show', $data->id) }}" class="btn btn sm btn-warning">Detail data</a></td>
                                <td>
                                    <form action="{{ route('pemesanan.destroy', $data->id) }}" method="POST">
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
