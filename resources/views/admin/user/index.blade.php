@extends('admin.main')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data user</div>
                
                <center>
                    <br>
                    <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah</a>
                </center>
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="table-responsive">
                    <br>
                    <table class="table"3 >
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th colspan="3" style="text-align:center;">Action</th>
                        </tr>
                        @php $no = 1; @endphp
                        @foreach ($user as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email}}</td>
                                <td><a href="{{ route('user.edit', $data->id) }}" class="btn btn sm btn-success">Edit</a></td>
                                <td>
                                    <form action="{{ route('user.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn sm btn-danger" type="submit">Delete Data</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection