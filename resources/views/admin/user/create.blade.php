@extends('admin.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah data User</div>

                <div class="card-body">
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                    <label for="">Name</label>
                    <input class="form-control" type="text" name="nama">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input class="form-control" type="text" name="email">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input class="form-control" type="password" name="pass">
                </div>
                <div class="form-group">
                   <button type="submit" class="btn btn-outline-info">Simpan Data</button>
                    <a href="{{ route('user.index') }}" class="btn btn-outline-info">Back</a>
                </div>
                </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
