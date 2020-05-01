<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Pemesanan;
use App\Pengembalian;
use App\Stokbarang;
use PDF;
use Alert;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $transaksi = Transaksi::all();
        $pengembalian = Pengembalian::all();
        return view('admin.transaksi.index', compact('transaksi', 'pengembalian'));
    }

    public function cetak_pdf($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $pengembalian = Pengembalian::all();
 
    	$pdf = PDF::loadview('admin.transaksi.pdf',['transaksi'=>$transaksi,'pengembalian'=>$pengembalian]);
    	return $pdf->stream('laporan-transaksi-pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stokbarang = Stokbarang::all();
        $pengembalian = Pengembalian::all();
        return view('admin.transaksi.create', compact('stokbarang', 'pengembalian'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaksi = new Transaksi;
        $transaksi->nama_admin = $request->nama;
        $transaksi->total_harga= $request->harga;
        $transaksi->jumlah_barang= $request->jumlah;
        $transaksi->pengembalian_id= $request->pengembalian; 
        $transaksi->save();
        $transaksi->stokbarang()->attach($request->stokbarang);
        toast('Success Toast', 'success');

        return redirect()->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $pengembalian = Pengembalian::all();

        return view('admin.transaksi.show', compact('transaksi', 'pengembalian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = transaksi::findOrFail($id);
        $stokbarang = Stokbarang::all();
        $selected = $transaksi->stokbarang->pluck('id')->toArray();
        $pengembalian = Pengembalian::all();
        return view('admin.transaksi.edit', compact('transaksi', 'stokbarang', 'selected', 'pengembalian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->nama_admin = $request->nama;
        $transaksi->jumlah_barang = $request->jumlah;
        $transaksi->total_harga= $request->harga;
        $transaksi->pengembalian_id= $request->pengembalian; 
        $transaksi->save();
        $transaksi->stokbarang()->sync($request->stokbarang);
        toast('Success Toast', 'success');

         return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('status', "Berhasil menghapus data transaksi berjudul $transaksi->nama_admin");
    }
}
