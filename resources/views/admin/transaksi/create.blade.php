@extends('admin.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah data Transaksi</div>

                <div class="card-body">
                <form action="{{ route('transaksi.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
            <div class="form-group">
              <label for="">Nama Admin</label>
              <input type="text" name="nama" id="" class="form-control" placeholder="Kode" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="">Nama Barang</label>
              <input type="text" name="barang" id="" class="form-control" placeholder="Kode" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="">Jumlah Barang</label>
              <select name="stokbarang" class="form-control">
          @foreach($stokbarang as $data)
              <option value="{{ $data->id }}">
                  {{ $data->barang_jumlah }}
              </option>
          @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="">Total Harga </label>
              <input type="text" name="harga" id="" class="form-control" placeholder="Total Harga" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="">Detail Tanggal Kembali</label>
              <select name="pengembalian" class="form-control">
          @foreach($pengembalian as $data)
              <option value="{{ $data->id }}">
                  {{ $data->detail_tgl_kembali }}
              </option>
          @endforeach
              </select>
            </div>
                <div class="form-group">
                   <button type="submit" class="btn btn-outline-info">Simpan Data</button>
                    <a href="{{ route('transaksi.index') }}" class="btn btn-outline-info">Back</a>
                </div>
                </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

