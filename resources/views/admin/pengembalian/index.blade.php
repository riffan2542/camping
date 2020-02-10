@extends('admin.index')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pengembalian</div>
                <center>
                    <br>
                    <a href="{{ route('pengembalian.create') }}" class="btn btn-primary">Tambah</a>
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
                            <th>Detail Tanggal Kembali</th>
                            <th>Detail Denda</th>
                            <th>Kondisi Barang</th>
                            <th colspan="3" style="text-align:center;">Action</th>
                        </tr>
                        @php $no = 1; @endphp   
                        @foreach ($pengembalian as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->detail_tgl_kembali }}</td>
                                <td>{{ $data->detail_denda }}</td>
                                <td>{{ $data->kondisi_barang }}</td>
                                <td><a href="{{ route('pengembalian.edit', $data->id) }}" class="btn btn sm btn-danger">Edit</a></td>
                                <td><a href="{{ route('pengembalian.show', $data->id) }}" class="btn btn sm btn-warning">Detail data</a></td>
                                <td>
                                    <form action="{{ route('pengembalian.destroy', $data->id) }}" method="POST">
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
