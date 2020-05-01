@extends('admin.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card-header bg-dark py-3">
        <form action="{{ route('transaksi.index') }}" method="get">
        <h5 class="m-0 font-weight-bold text-white">{{ __('Tambah Data Transaksi')}}
        </h5>
        </form>
      </div>
            <div class="card">
                <div class="card-body">
                <form action="{{ route('transaksi.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
            <div class="form-group">
              <label for="">Nama Admin</label>
              <input type="text" name="nama" id="" class="form-control" placeholder="Isi Nama Admin" aria-describedby="helpId" required>
            </div>
            <div class="form-group">
              <label for="">Nama Barang</label>
              <select name="stokbarang[]" class="form-control" required id="select2" style="width:100%;" multiple>
                @foreach ($stokbarang as $data)
              <option value="{{ $data->id }}">{{ $data->barang_nama }}</option>
                @endforeach
              </select>
            </div>  
            <div class="form-group">
              <label for="">Jumlah Barang </label>
              <input type="text" name="jumlah" id="" class="form-control" placeholder="Isi Jumlah Barang" aria-describedby="helpId" required>
            </div>
            <div class="form-group">
              <label for="">Total Harga </label>
              <input type="text" name="harga" id="" class="form-control" placeholder="Isi Total Harga" aria-describedby="helpId" required>
            </div>
            <div class="form-group">
              <label for="">Detail Tanggal Kembali</label>
              <select name="pengembalian" class="form-control" required>
          @foreach($pengembalian as $data)
              <option value="{{ $data->id }}">
                  {{ $data->detail_tgl_kembali }}
              </option>
          @endforeach
              </select>
            </div>
                <div class="form-group">
                   <button type="submit" class="btn btn-dark">Simpan Data</button>
                    <a href="{{ route('transaksi.index') }}" class="btn btn-dark">Back</a>
                </div>
                </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

