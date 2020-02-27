@extends('admin.index')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mengubah Data Stok Barang</div>
                <div class="card-body">
                    <form action="{{ route('stokbarang.update', $stokbarang->id) }}" method="post" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}
    <div class="form-group">
        <label for="">Kode </label>
        <input class="form-control" value="{{ $stokbarang->kode }}" type="text" name="kode">
    </div>
    <div class="form-group">
        <label for="">Kategori</label>
        <select name="kategori" class="form-control">
            @foreach($kategori as $data)
                <option value="{{ $data->id }}"
                    {{ $stokbarang->kategori->id ==
                        $data->id ? 'selected="selected"' : '' }}>
                    {{ $data->kategori_nama }}
                </option>
            @endforeach
        </select>
    </div>
     <div class="form-group">
        <label for="">Nama Barang</label>
        <input class="form-control" value="{{ $stokbarang->barang_nama }}" type="text" name="nama">
    </div>
    <div class="form-group">
        <label for="">Foto</label>
        @if (isset($stokbarang) && $stokbarang->foto)
        <p>
            <img src="{{ asset('/assets/img/fotobarang/'. $stokbarang->foto.'') }}" alt="Foto" width="100px" height="100px" style="border-radius: 6%">
        </p>
        @endif
        <input class="form-control" type="file" name="foto" value="{{ $stokbarang->foto }}" required>
    </div>
    <div class="form-group">
        <label for="">Stok Barang</label>
        <input class="form-control" value="{{ $stokbarang->barang_jumlah }}" type="text" name="jumlah">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-outline-info">
        Simpan Data
        </button>
    </div>
    <div class="form-group">
        <a href="{{ url('stokbarang.index') }}" class="btn btn-outline-info">Kembali</a>
    </div>
        </form>
            </div>
                </div>
                    </div>
                        </div>
                            </div>
@endsection