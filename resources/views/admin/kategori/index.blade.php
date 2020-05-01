@extends('admin.main')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="card-header bg-dark py-3">
          <form action="{{ route('kategori.index') }}" method="get">
          <h5 class="m-0 font-weight-bold text-white">{{ __('Category Data')}}
          <button type="button" class="btn btn-success btn float-right" data-toggle="modal" 
          data-target="#exampleModal"><i class="fas fa-plus"></i> Plus</button>
          </h5>
          </form>
        </div>
          @if (session('status'))
              <div  class="alert alert-danger alert-block" role="alert">
                  {{ session('status') }}
              </div>
          @endif
            <div class="card">
                <div class="table-responsive">
                <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <th>No</th>
                <th>Name</th>
                <th width="25%">Action</th>
                
                <!-- <th colspan="3" style="text-align:center;">Action</th> -->
                </thead>
                <tbody>
                 @php $no = 1; @endphp
                        @foreach ($kategori as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->kategori_nama}}</td>
                                <td>
                                <a href="{{ route('kategori.edit', $data->id) }}" class="btn btn-warning"><i class="nav-icon fas fa-edit"></i> Edit</a>
                                <button class="btn btn-danger" type="submit"  data-toggle="modal" data-target="#modal-lg1"><i class="fa fa-trash"></i> Delete</button></td>
                            </tr>
                        @endforeach
                </tbody>
              </table>
            </div> 
                @include('sweetalert::alert')  
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="header bg-dark">
      <div class="modal-header">
          <h5 class="m-0 font-weight-bold text-white">{{ __('Add Category Data')}}
          </h5>
      <!-- <div class="card-header bg-dark py-3">
          <h5 class="m-0 font-weight-bold text-white">{{ __('Stock Of Goods Data')}}
          </h5>
          </form>
        </div> -->
          <!-- <h5 class="modal-title" id="exampleModalLabel">Add Category Data</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
      </div>
      <div class="modal-body">
        <form action="{{ route('kategori.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input class="form-control" type="text" name="nama" placeholder="fill in the Name" required>
            </div>
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-dark"><i class="fas fa-plus"></i> Save Data</button>
      </div>
      </form>
    </div>
  </div>
</div>
 <!-- <div id="InformationproModalalert" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
                <span class="educate-icon educate-info modal-check-pro information-icon-pro"> </span>
                <h2>Information!</h2>
                <p>The Modal plugin is a dialog box/popup window that is displayed on top of the current page</p>
            </div>
            <div class="modal-footer info-md">
                <a data-dismiss="modal" href="#">Cancel</a>
                <a href="#">Process</a>
            </div>
        </div>
    </div>
  </div> -->
  <div class="modal fade" id="modal-lg1">
        <div class="modal-dialog modal-lg">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
          <div class="modal-content">
          <div class="header bg-dark">
            <div class="modal-header">
              <h4 class="modal-title">Do You Really Want To Delete This Return?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
              <form action="{{ route('kategori.destroy', $data->id) }}" method="POST">
                  @csrf
                  <input type="hidden" name="_method" value="DELETE">
                  <button class="btn btn-dark" type="submit"><i class="fa fa-trash-alt"> Delete</i></button>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    @endsection