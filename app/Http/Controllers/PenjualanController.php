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
        Penjualan::create([
            'nama_pembeli' => request('bahanbaku_id'),
            'barang_terjual' => request('jumlah'),
            'keterangan' => request('keterangan'),
            'total_harga' => request('total'),
        ]);
        return redirect()->route('admin.penjualan.index');
    }
}
