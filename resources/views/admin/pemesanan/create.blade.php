@extends('admin.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah data Pemesanan</div>

                <div class="card-body">
                <form action="{{ route('pemesanan.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
            <div class="form-group">
              <label for="">Kode</label>
              <input type="text" name="kode" id="" class="form-control" placeholder="Kode" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="">Nama Barang </label>
              <select name="nama" id="select2" class="form-control" placeholder="Nama Barang" aria-describedby="helpId"><option value=""></option></select>
            </div>
            <div class="form-group">
              <label for="">Kategori</label>
              <select name="kategori" class="form-control">
          @foreach($kategori as $data)
              <option value="{{ $data->id }}">
                  {{ $data->kategori_nama }}
              </option>
          @endforeach
              </select>
            </div>
            <div class="form-group">
                <label for="">Foto</label>
                <input type="file" class="form-control" name="foto">
            </div>
            <div class="form-group">
              <label for="">Jumlah Barang</label>
              <input type="number" name="jumlah" id="" class="form-control" placeholder="Jumlah Barang" aria-describedby="helpId">
            </div>
                <div class="form-group">
                   <button type="submit" class="btn btn-outline-info">Simpan Data</button>
                    <a href="{{ route('pemesanan.index') }}" class="btn btn-outline-info">Back</a>
                </div>
                </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection