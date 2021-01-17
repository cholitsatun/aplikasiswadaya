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
}
