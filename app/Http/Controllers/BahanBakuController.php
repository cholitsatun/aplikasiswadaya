<?php

namespace App\Http\Controllers;

use App\BahanBaku;
use Illuminate\Http\Request;

class BahanBakuController extends Controller
{
    public function index() {
        $bahan = BahanBaku::all();
        return view('admin.bahan.bahanbaku', compact('bahan'));
    }

    public function create() {
        return view ('admin.bahan.tambahbahan');
    }

    public function store(Request $request){
        $tambahbahan = BahanBaku::create([
            'nama_bahan' => request('bahan'),
            'supplier' => request('supplier'),
            'stok_bahan' => request('stok'),
            'tanggal_masuk' => request('tanggal'),

        ]);
        return redirect('/bahanbaku');
    }
}
