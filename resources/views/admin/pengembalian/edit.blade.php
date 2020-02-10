@extends('admin.index')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mengubah Data Pengembalian</div>
                <div class="card-body">
                    <form action="{{ route('pengembalian.update', $pengembalian->id) }}" method="post">
                        <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}
    <div class="form-group">
        <label for="">Kode </label>
        <input class="form-control" value="{{ $pengembalian->detail }}" type="text" name="kode">
    </div>
     <div class="form-group">
        <label for="">Nama </label>
        <input class="form-control" value="{{ $pengembalian->pengembalian_nama }}" type="text" name="nama">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-outline-info">
        Simpan Data
        </button>
    </div>
    <div class="form-group">
        <a href="{{ url('pengembalian.index') }}" class="btn btn-outline-info">Kembali</a>
    </div>
        </form>
            </div>
                </div>
                    </div>
                        </div>
                            </div>
@endsection