@extends('admin.index')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mengubah Data Pemesanan</div>
                <div class="card-body">
                    <form action="{{ route('pemesanan.update', $pemesanan->id) }}" method="post">
                        <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}
    <div class="form-group">
        <label for="">Kode </label>
        <input class="form-control" value="{{ $pemesanan->kode }}" type="text" name="kode">
    </div>
    <div class="form-group">
            <label for="">Nama Barang</label>
            <select name="stokbarang[]" id="select2" class="form-control multiple" multiple>
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
        <label for="">Kategori</label>
        <select name="kategori" class="form-control">
            @foreach($kategori as $data)
                <option value="{{ $data->id }}"
                    {{ $pemesanan->kategori->id ==
                        $data->id ? 'selected="selected"' : '' }}>
                    {{ $data->kategori_nama }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Jumlah Barang</label>
        <input class="form-control" value="{{ $pemesanan->jumlah_barang }}" type="number" name="jumlah">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-outline-info">
        Simpan Data
        </button>
    </div>
    <div class="form-group">
        <a href="{{ route('pemesanan.index') }}" class="btn btn-outline-info">Kembali</a>
    </div>
        </form>
            </div>
                </div>
                    </div>
                        </div>
                            </div>
@endsection