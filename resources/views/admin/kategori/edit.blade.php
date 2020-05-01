@extends('admin.main')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card-header bg-dark py-3">
        <h5 class="m-0 font-weight-bold text-white">{{ __('Change Category Data')}}
        </h5>
        </form>
      </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('kategori.update', $kategori->id) }}" method="post">
                        <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}
     <div class="form-group">
        <label for="">Name</label>
        <input class="form-control" value="{{ $kategori->kategori_nama }}" type="text" name="nama" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-dark">
        Save Data
        </button>
        <a href="{{ route('kategori.index') }}" class="btn btn-dark">Back</a>
    </div>
        </form>
            </div>
                </div>
                    </div>
                        </div>
                            </div>
@endsection