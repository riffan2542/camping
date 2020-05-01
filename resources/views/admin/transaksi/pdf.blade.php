
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h2>Struk Hasil Barang Yang Disewa</h2>
		</center>
 
  <div class="container">
        <div class="form-group">
            <label for="">Admin Name</label>
            <input disabled type="text" name="nama" value="{{ $transaksi->nama_admin }}" class="form-control" placeholder="Nama mahasiswa" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="">The Amount Of Goods</label>
            <input disabled type="text" name="jumlah" value="{{ $transaksi->jumlah_barang }}" class="form-control" placeholder="Jumlah Barang" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="">Total Price</label>
            <input disabled type="text" name="harga" value="{{ $transaksi->total_harga }}" class="form-control" placeholder="Total Harga" aria-describedby="helpId">
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
        </div>
</body>
</html>