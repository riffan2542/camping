@extends('admin.main')
@section('content')
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card-header bg-dark py-3">
        <form action="{{ route('transaksi.index') }}" method="get">
        <h5 class="m-0 font-weight-bold text-white">{{ __('Mengubah Data Transaksi')}}
        </h5>
        </form>
      </div>
      <div class="card">
        <div class="card-body">
      <div class="form-group">
        <label for="">Nama Admin </label>
        <input disabled class="form-control" value="{{ $transaksi->nama_admin }}" type="text" name="nama" required>
    </div>
    <div class="form-group">
        <label for="">Jumlah Barang </label>
        <input disabled class="form-control" value="{{ $transaksi->jumlah_barang }}" type="text" name="jumlah" required>
    </div>
     <div class="form-group">
        <label for="">Total Harga</label>
        <input disabled class="form-control" value="{{ $transaksi->total_harga }}" type="number" name="harga" required>
    </div>
    <div class="form-group">
        <label for="">Detail Tanggal Kembali</label>
        <select disabled name="pengembalian" class="form-control" required>
            @foreach($pengembalian as $data)
                <option value="{{ $data->id }}"
                    {{ $transaksi->pengembalian->id ==
                        $data->id ? 'selected="selected"' : '' }}>
                    {{ $data->detail_tgl_kembali }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
    <a href="{{ route('cetak_pdf', $transaksi->id) }}" class="btn btn-dark" target="_blank">CETAK PDF</a>
        <a href="{{ route('transaksi.index') }}" class="btn btn-dark">Back</a>
    </div>
        </form>
            </div>
                </div>
                    </div>
                </div>
            </div> 
        </body>
        </html>
@endsection
