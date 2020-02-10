<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stokbarang;
use App\User;
use App\Kategori;
use Alert;

class StokbarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stokbarang = Stokbarang::all();
        return view('admin.stokbarang.index', compact('stokbarang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $kategori = Kategori::all();
        return view('admin.stokbarang.create', compact('user', 'kategori'));
        // $stokbarang = Stokbarang::all();
        // return view('admin.stokbarang.create', compact('stokbarang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stokbarang = new Stokbarang;
        $stokbarang->kode = $request->kode;
        $stokbarang->user_id = $request->user;
        $stokbarang->kategori_id = $request->kategori;
        $stokbarang->barang_nama= $request->nama;
        $stokbarang->barang_jumlah= $request->jumlah; 
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $destinationPath = public_path() . '/assets/img/fotobarang/';
            $filename = '_' . $file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $stokbarang->foto = $filename;
        }
        $stokbarang->save();

        return redirect()->route('stokbarang.index')->with('status', "Berhasil menyimpan stokbarang $stokbarang->barang_nama");
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
