@extends('admin.main')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card-header bg-dark py-3">
        <form action="{{ route('stokbarang.index') }}" method="get">
        <h5 class="m-0 font-weight-bold text-white">{{ __('Change Item Stock Data')}}
        </h5>
        </form>
      </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('stokbarang.update', $stokbarang->id) }}" method="post" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}
    <div class="form-group">
        <label for="">Code </label>
        <input class="form-control" value="{{ $stokbarang->kode }}" type="text" name="kode" required>
    </div>
    <div class="form-group">
        <label for="">Category</label>
        <select name="kategori" class="form-control" required>
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
        <label for="">Name Of Goods</label>
        <input class="form-control" value="{{ $stokbarang->barang_nama }}" type="text" name="nama" required>
    </div>
    <div class="form-group">
        <label for="">Photo</label>
        @if (isset($stokbarang) && $stokbarang->foto)
        <p>
            <img src="{{ asset('/assets/img/fotobarang/'. $stokbarang->foto.'') }}" alt="Foto" width="100px" height="100px" style="border-radius: 6%">
        </p>
        @endif
        <input class="form-control" type="file" name="foto" value="{{ $stokbarang->foto }}" required>
    </div>
    <div class="form-group">
        <label for="">Price Of Goods</label>
        <input class="form-control" value="{{ $stokbarang->harga_barang }}" type="text" name="harga" required>
    </div>
    <div class="form-group">
        <label for="">Stock Of Goods</label>
        <input class="form-control" value="{{ $stokbarang->barang_jumlah }}" type="number" name="jumlah" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-dark">
        Save Data
        </button>
        <a href="{{ route('stokbarang.index') }}" class="btn btn-dark">Back</a>
    </div>
        </form>
            </div>
                </div>
                    </div>
                        </div>
                            </div>
@endsection
