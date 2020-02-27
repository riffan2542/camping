<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Stokbarang;
use App\Pengembalian;
use Alert;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        return view('admin.transaksi.index', compact('transaksi'));
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
        $transaksi->nama_barang = $request->barang;
        $transaksi->total_harga= $request->harga;
        $transaksi->stokbarang_id= $request->stokbarang;
        $transaksi->pengembalian_id= $request->pengembalian; 
        $transaksi->save();

        return redirect()->route('transaksi.index')->with('status', "Berhasil menyimpan transaksi $transaksi->nama_admin");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $pengembalian = Pengembalian::all();
        return view('admin.transaksi.edit', compact('transaksi', 'stokbarang', 'pengembalian'));
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
        $transaksi->nama_barang = $request->barang;
        $transaksi->stokbarang_id = $request->stokbarang;
        $transaksi->total_harga= $request->harga;
        $transaksi->pengembalian_id= $request->pengembalian; 
        $transaksi->save();
         return redirect()->route('transaksi.index')->with('status', "Berhasil menyimpan transaksi $transaksi->nama_admin");
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
