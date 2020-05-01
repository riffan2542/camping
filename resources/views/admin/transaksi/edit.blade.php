@extends('admin.main')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card-header bg-dark py-3">
        <form action="{{ route('transaksi.index') }}" method="get">
        <h5 class="m-0 font-weight-bold text-white">{{ __('Mengubah Data Transaksi')}}
        </h5>
        </form>
      </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="post" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}
    <div class="form-group">
        <label for="">Nama Admin </label>
        <input class="form-control" value="{{ $transaksi->nama_admin }}" type="text" name="nama" required>
    </div>
    <div class="form-group">
            <label for="">Nama Barang</label>
            <select name="stokbarang[]" id="select2" class="form-control multiple" required multiple>
                @foreach($stokbarang as $data)
                    <option value="{{ $data->id }}"
                    {{ (in_array($data->id, $selected)) ?
                        'selected="selected"' : '' }}>
                        {{ $data->barang_nama }}
                    </option>
                @endforeach
            </select>
        </div>
    <div class="form-group">
        <label for="">Jumlah Barang </label>
        <input class="form-control" value="{{ $transaksi->jumlah_barang }}" type="text" name="jumlah" required>
    </div>
     <div class="form-group">
        <label for="">Total Harga</label>
        <input class="form-control" value="{{ $transaksi->total_harga }}" type="number" name="harga" required>
    </div>
    <div class="form-group">
        <label for="">Detail Tanggal Kembali</label>
        <select name="pengembalian" class="form-control" required>
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
        <button type="submit" class="btn btn-dark">
        Save Data
        </button>
        <a href="{{ route('transaksi.index') }}" class="btn btn-dark">Back</a>
    </div>
        </form>
            </div>
                </div>
                    </div>
                        </div>
                            </div>
@endsection