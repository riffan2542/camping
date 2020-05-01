@extends('admin.main')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Pemesanan</div>
                <center>
                    <br>
                    <a href="{{ route('pemesanan.create') }}" class="btn btn-outline-info">Tambah</a>
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
                            <th>Jumlah Barang</th>
                            <th colspan="3" style="text-align:center;">Action</th>
                        </tr>
                        @php $no = 1; @endphp   
                        @foreach ($pemesanan as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->kode }}</td>
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
                                <td>{{ $data->kategori->kategori_nama }}</td>
                                <td>{{ $data->jumlah_barang }}</td>
                                <td><a href="{{ route('pemesanan.edit', $data->id) }}" class="btn btn-outline-danger"><i class="nav-icon fas fa-edit"></i></a></td>
                                <td>
                                    <form action="{{ route('pemesanan.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-outline-success" type="submit"><i class="fa fa-trash-alt"></i></button>
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
