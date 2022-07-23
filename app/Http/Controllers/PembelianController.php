<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan semua data dari model Pembelian
        $Pembelian = Pembelian::all();
        $activate = "Pembelian";
        return view('Pembelian.index', compact('Pembelian','activate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Pembelian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $validated = $request->validate([
            'nama_pembeli' => 'required',
            'tanggal_pembelian' => 'required',
            'nama_barang' => 'required|max:255',
            'harga_satuan' => 'required',
            'jumlah_barang' => 'required',
            'total_harga',
        ]);

        
        $Pembelian = new Pembelian();
        $Pembelian->nama_pembeli = $request->nama_pembeli;
        $Pembelian->tanggal_pembelian = $request->tanggal_pembelian;
        $Pembelian->nama_barang = $request->nama_barang;
        $Pembelian->harga_satuan = $request->harga_satuan;
        $Pembelian->jumlah_barang = $request->jumlah_barang;
        $Pembelian->total_harga = $request->harga_satuan * $request->jumlah_barang;
        $Pembelian->save();
        return redirect()->route('Pembelian.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Pembelian = Pembelian::findOrFail($id);
        return view('Pembelian.show', compact('Pembelian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Pembelian = Pembelian::findOrFail($id);
        return view('Pembelian.edit', compact('Pembelian'));

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
        // Validasi
        $validated = $request->validate([
            'nama_pembeli' => 'required',
            'tanggal_pembelian' => 'required',
            'nama_barang' => 'required|max:255',
            'harga_satuan' => 'required',
            'jumlah_barang' => 'required',
            'total_harga',
        ]);

        $Pembelian = Pembelian::findOrFail($id);
        $Pembelian->nama_pembeli = $request->nama_pembeli;
        $Pembelian->tanggal_pembelian = $request->tanggal_pembelian;
        $Pembelian->nama_barang = $request->nama_barang;
        $Pembelian->harga_satuan = $request->harga_satuan;
        $Pembelian->jumlah_barang = $request->jumlah_barang;
        $Pembelian->total_harga = $request->harga_satuan * $request->jumlah_barang;
        $Pembelian->save();
        return redirect()->route('Pembelian.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Pembelian = Pembelian::findOrFail($id);
        $Pembelian->delete();
        return redirect()->route('Pembelian.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}