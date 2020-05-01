@extends('admin.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card-header bg-dark py-3">
        <form action="{{ route('stokbarang.index') }}" method="get">
        <h5 class="m-0 font-weight-bold text-white">{{ __('Add Stock Data')}}
        </h5>
        </form>
      </div>
            <div class="card">
                <div class="card-body">
                <form action="{{ route('stokbarang.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
            <div class="form-group">
              <label for="">Code</label>
              <input type="text" name="kode" id="" class="form-control" placeholder="Kode" aria-describedby="helpId" required>
            </div>
            <div class="form-group">
                <label for="">Photo</label>
                <input type="file" class="form-control" name="foto" required>
            </div>
            <div class="form-group">
              <label for="">Category</label>
              <select name="kategori" class="form-control" required>
          @foreach($kategori as $data)
              <option value="{{ $data->id }}">
                  {{ $data->kategori_nama }}
              </option>
          @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="">Name Of Goods</label>
              <input type="text" name="nama" id="" class="form-control" placeholder="fill in the name of the item" aria-describedby="helpId" required>
            </div>
            <div class="form-group">
              <label for="">Price Of Goods</label>
              <input type="text" name="harga" id="" class="form-control" placeholder="fill in the price of the item" aria-describedby="helpId" required>
            </div>
            <div class="form-group">
              <label for="">Stock Of Goods</label>
              <input type="number" name="jumlah" id="" class="form-control" placeholder="fill in the number of items" aria-describedby="helpId" required>
            </div>
                <div class="form-group">
                   <button type="submit" class="btn btn-dark">Save Data</button>
                    <a href="{{ route('stokbarang.index') }}" class="btn btn-dark">Back</a>
                </div>
                </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

