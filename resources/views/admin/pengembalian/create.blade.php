@extends('admin.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambah data Pengembalian</div>

                <div class="card-body">
                <form action="{{ route('pengembalian.store') }}" method="post">
                    @csrf
            <div class="form-group">
              <label for="">Detail Tanggal Kembali</label>
              <input type="date" name="detail_tgl_kembali" id="" class="form-control" placeholder="Detail Tanggal Kembali" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="">Kondisi Barang</label>
              <input type="text" name="kondisi_barang" id="" class="form-control" placeholder="Kondisi Barang" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="">Detail Denda</label>
              <input type="number" name="detail_denda" id="" class="form-control" placeholder="Detail Denda" aria-describedby="helpId">
            </div>
                <div class="form-group">
                   <button type="submit" class="btn btn-outline-info">Simpan Data</button>
                    <a href="{{ route('pengembalian.index') }}" class="btn btn-outline-info">Back</a>
                </div>
                </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

