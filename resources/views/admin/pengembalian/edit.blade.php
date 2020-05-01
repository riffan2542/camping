@extends('admin.main')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card-header bg-dark py-3">
        <form action="{{ route('stokbarang.index') }}" method="get">
        <h5 class="m-0 font-weight-bold text-white">{{ __('Change Data Returns')}}
        </h5>
        </form>
      </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('pengembalian.update', $pengembalian->id) }}" method="post">
                        <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}
    <div class="form-group">
        <label for="">Return Date Details</label>
        <input class="form-control" value="{{ $pengembalian->detail_tgl_kembali }}" type="date" name="detail_tgl_kembali" required>
    </div>
    <div class="form-group">
        <label for="">Condition Of Goods</label>
        <input class="form-control" value="{{ $pengembalian->kondisi_barang }}" type="text" name="kondisi_barang" required>
    </div>
     <div class="form-group">
        <label for="">Fine Details</label>
        <input class="form-control" value="{{ $pengembalian->detail_denda }}" type="number" name="detail_denda" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-dark">
        Save Data
        </button>
        <a href="{{ route('pengembalian.index') }}" class="btn btn-dark">Back</a>
    </div>
        </form>
            </div>
                </div>
                    </div>
                        </div>
                            </div>
@endsection