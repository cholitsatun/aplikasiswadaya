<?php

namespace App\Http\Controllers;

use App\Produk;
use App\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index(){
        $penjualan = Penjualan::all();
        return view('admin.penjualan.penjualan', compact('penjualan'));
    }

    public function create(){
        $produk = Produk::all();
        return view('admin.penjualan.tambah', compact('produk'));
    }

    public function store(Request $request){
        $produk = Produk::find($request->product_id);
        $produk->update([
            'stok_produk' => $produk->stok_produk - $request->jumlah
        ]);
        Penjualan::create([
            'product_id' => request('product_id'),
            'tanggal_beli' => request('tanggal_beli'),
            'nama_pembeli' => request('nama_pembeli'),
            'barang_terjual' => request('jumlah'),
            'keterangan' => request('keterangan'),
            'total_harga' => request('total'),
        ]);
        return redirect()->route('admin.penjualan.index');
    }

    public function edit($id) {
        $produk = Produk::all();        
        $penjualan = Penjualan::findOrFail($id);   
        return view('admin.penjualan.edit', compact('produk', 'penjualan'));
    }

    public function update(Request $request, $id){
        $produk = Produk::find($request->product_id);
        $penjualan = Penjualan::find($id);    
        $produk->update([
            'stok_produk' => $produk->stok_produk + $penjualan->barang_terjual - $request->jumlah          
        ]);

        $penjualan->update([
            'product_id' => request('product_id'),
            'tanggal_beli' => request('tanggal_beli'),
            'nama_pembeli' => request('nama_pembeli'),
            'barang_terjual' => request('jumlah'),
            'keterangan' => request('keterangan'),
            'total_harga' => request('total'), 
        ]);

        return redirect()->route('admin.penjualan.index');
    }

    public function destroy($id) {
        // cari input produk
        $penjualan = Penjualan::find($id);                
        // undo bahan baku dan stok otomatis
        $produk = Produk::find($penjualan->product_id);
        $produk->update([                    
            'stok_produk' => $produk->stok_produk + $penjualan->barang_terjual
        ]);
        // hapus input produk
        $penjualan->delete();
        return redirect()->route('admin.penjualan.index');
    }
}
