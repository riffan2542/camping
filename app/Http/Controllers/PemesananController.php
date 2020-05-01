<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemesanan;
use App\Kategori;
use App\Stokbarang;
use Alert;
use Illuminate\Support\Facades\File;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemesanan = Pemesanan::all();
        return view('admin.pemesanan.index', compact('pemesanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        $stokbarang = Stokbarang::all();
        return view('admin.pemesanan.create', compact('kategori', 'stokbarang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pemesanan = new Pemesanan;
        $pemesanan->kode = $request->kode;
        $pemesanan->kategori_id = $request->kategori;
        $pemesanan->jumlah_barang= $request->jumlah; 
        $pemesanan->save();
        $pemesanan->stokbarang()->attach($request->stokbarang);

        return redirect()->route('pemesanan.index')->with('status', "Berhasil menyimpan Pemesanan $pemesanan->jumlah_barang");
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
        $pemesanan = Pemesanan::findOrFail($id);
        $kategori = Kategori::all();
        $stokbarang = Stokbarang::all();
        $selected = $pemesanan->stokbarang->pluck('id')->toArray();
        return view('admin.pemesanan.edit', compact('pemesanan', 'kategori', 'selected', 'stokbarang'));
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
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->kode = $request->kode;
        $pemesanan->kategori_id = $request->kategori;
        $pemesanan->jumlah_barang= $request->jumlah; 
        $pemesanan->save();
        $pemesanan->stokbarang()->sync($request->stokbarang);
         return redirect()->route('pemesanan.index')->with('status', "Berhasil mengedit pemesanan $pemesanan->jumlah_barang");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->delete();
        return redirect()->route('pemesanan.index')->with('status', "Berhasil menghapus data pemesanan berjudul $pemesanan->jumlah_barang");
    }
}
