@extends('admin.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Category Data</div>

                <div class="card-body">
                <form action="{{ route('kategori.store') }}" method="post">
                    @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input class="form-control" type="text" name="name">
                </div>
                <div class="form-group">
                   <button type="submit" class="btn btn-outline-info">Save Data</button>
                    <a href="{{ route('kategori.index') }}" class="btn btn-outline-info">Back</a>
                </div>
                </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
