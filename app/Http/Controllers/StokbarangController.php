<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stokbarang;
use App\Kategori;
use Alert;
use Illuminate\Support\Facades\File;

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
        $kategori = Kategori::all();
        return view('admin.stokbarang.create', compact('kategori'));
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
        $stokbarang->kategori_id = $request->kategori;
        $stokbarang->barang_nama= $request->nama;
        $stokbarang->barang_jumlah= $request->jumlah; 
        $stokbarang->harga_barang= $request->harga; 
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $destinationPath = public_path() . '/assets/img/fotobarang/';
            $filename = '_' . $file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $stokbarang->foto = $filename;
        }
        $stokbarang->save();
        toast('Success Toast', 'success');

        return redirect()->route('stokbarang.index');
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
        $stokbarang = Stokbarang::findOrFail($id);
        $kategori = Kategori::all();
        return view('admin.stokbarang.edit', compact('stokbarang', 'kategori'));
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
       $stokbarang = Stokbarang::findOrFail($id);
       $stokbarang->kode = $request->kode;
       $stokbarang->kategori_id = $request->kategori;
       $stokbarang->barang_nama= $request->nama;
       $stokbarang->barang_jumlah= $request->jumlah; 
       $stokbarang->harga_barang= $request->harga; 

        if ($request->hasFile('foto')){
            $file = $request->file('foto');
            $path = public_path().
                            '/assets/img/fotobarang/';
            $filename ='_'
                        .$file->getClientOriginalName();
            $uploadSuccess = $file->move(
                $path,
                $filename
            );
            // hapus foto lama, jika ada
            if ($stokbarang->foto){
                $old_foto =$stokbarang->foto;
                $filepath = public_path()
                .'/assets/img/fotobarang'
                .$stokbarang->foto;    
                try {
                    File::delete($filepath);
                } catch (FileNotFoundException $e) {
                    // File sudah dihapus/tidak ada
                }
            }
           $stokbarang->foto = $filename;
        }
       $stokbarang->save();
       toast('Success Toast', 'success');
        return redirect()->route('stokbarang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $stokbarang = Stokbarang::findOrFail($id);
        if ($stokbarang->foto) {
            $old_foto =$stokbarang->foto;
            $filepath = public_path() . '/assets/img/fotobarang/' .$stokbarang->foto;
            try {
                File::delete($filepath);
            } catch (FileNotFoundException $e) { }
        }

       $stokbarang->delete();
        return redirect()->route('stokbarang.index')->with('status', "Berhasil menghapus data stokbarang berjudul $stokbarang->barang_nama");
    }
}
