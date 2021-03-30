<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
        //fungsi eloquent menampilkan data menggunakan pagination
        $barangs = Barang::all(); // Mengambil semua isi tabel
        $posts = Barang::orderBy('id_barang', 'kode_barang', 'nama_barang', 'kategori_barang', 'harga', 'qty')->paginate(6);
        return view('barangs.index', compact('barangs'));
        with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('barangs.create');
    }
    public function store(Request $request)
    {      
    //melakukan validasi data
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'kategori_barang' => 'required',
            'harga' => 'required',
            'qyt' => 'required',
        ]);
    //fungsi eloquent untuk menambah data
    Barang::create($request->all());
    
    //jika data berhasil ditambahkan, akan kembali ke halaman utama
    return redirect()->route('barangs.index')
        ->with('success', 'Barang Berhasil Ditambahkan');
   
    }
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
