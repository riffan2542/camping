<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengembalian;
use Alert;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengembalian =Pengembalian::all();
        return view('admin.pengembalian.index', compact('pengembalian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengembalian = Pengembalian::all();
        return view('admin.pengembalian.create', compact('pengembalian'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pengembalian = new Pengembalian;
        $pengembalian->detail_tgl_kembali = $request->detail_tgl_kembali;
        $pengembalian->detail_denda = $request->detail_denda;
        $pengembalian->kondisi_barang = $request->kondisi_barang;
        $pengembalian->save();
        toast('Success Toast', 'success');

        return redirect()->route('pengembalian.index');
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
        $pengembalian = Pengembalian::findOrFail($id);
        return view('admin.pengembalian.edit',compact('pengembalian'));
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
        $pengembalian = Pengembalian::findOrFail($id);
        $pengembalian->detail_tgl_kembali = $request->detail_tgl_kembali;
        $pengembalian->detail_denda = $request->detail_denda;
        $pengembalian->kondisi_barang = $request->kondisi_barang;
        $pengembalian->save();
        toast('Success Toast', 'success');
       
        return redirect()->route('pengembalian.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengembalian = Pengembalian::findOrFail($id);
        $pengembalian->delete();
        return redirect()->route('pengembalian.index')->with('status', "Berhasil menghapus data pengembalian berjudul $pengembalian->kondisi_barang");
    }
}
