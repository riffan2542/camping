@extends('admin.index')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mengubah Data Transaksi</div>
                <div class="card-body">
                    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="post" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}
    <div class="form-group">
        <label for="">Nama Admin </label>
        <input class="form-control" value="{{ $transaksi->nama_admin }}" type="text" name="nama">
    </div>
    <div class="form-group">
        <label for="">Nama Barang </label>
        <input class="form-control" value="{{ $transaksi->nama_barang }}" type="text" name="barang">
    </div>
    <div class="form-group">
        <label for="">Jumlah Barang</label>
        <select name="stokbarang" class="form-control">
            @foreach($stokbarang as $data)
                <option value="{{ $data->id }}"
                    {{ $transaksi->stokbarang->id ==
                        $data->id ? 'selected="selected"' : '' }}>
                    {{ $data->barang_jumlah }}
                </option>
            @endforeach
        </select>
    </div>
     <div class="form-group">
        <label for="">Total Harga</label>
        <input class="form-control" value="{{ $transaksi->total_harga }}" type="number" name="harga">
    </div>
    <div class="form-group">
        <label for="">Detail Tanggal Kembali</label>
        <select name="pengembalian" class="form-control">
            @foreach($pengembalian as $data)
                <option value="{{ $data->id }}"
                    {{ $transaksi->pengembalian->id ==
                        $data->id ? 'selected="selected"' : '' }}>
                    {{ $data->detail_tgl_kembali }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-outline-info">
        Simpan Data
        </button>
    </div>
    <div class="form-group">
        <a href="{{ url('transaksi.index') }}" class="btn btn-outline-info">Kembali</a>
    </div>
        </form>
            </div>
                </div>
                    </div>
                        </div>
                            </div>
@endsection