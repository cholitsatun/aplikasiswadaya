<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\InputBahan;
use App\InputProduk;
use App\Penjualan;
use App\Produk;


class DashboardController extends Controller
{
    public function index(){        
        // dapatkan jumlah produksi
        $produksi_produk = InputProduk::whereDate('tanggal_inp', Carbon::today())->sum('jumlah_inp');
        
        // dapatkan jumlah bahan baku yang terpakai
        $input_produks = InputProduk::whereDate('tanggal_inp', Carbon::today())->get();       
        $bahan_terpakai = 0;
        # setiap input produk pada hari ini
        foreach ($input_produks as $input_produk) {
            // setiap jumlah input produk tersebut            
            for ($i=0; $i < $input_produk->jumlah_inp ; $i++) { 
                // produknya apa
                $produk = $input_produk->Produk;
                //bahan bakunya apa aja
                $bahans = $produk->BahanBaku()->get();
                // untuk setiap bahan baku yang terpakai, tambahkan ke bahan terpakai
                foreach ($bahans as $bahan){                
                    $bahan_terpakai += $bahan->pivot->jumlah_bahan;
                }            
            }
        }        

        // dapatkan bahan baku yang masuk
        $bahan_masuk = InputBahan::whereDate('tanggal_inb', Carbon::today())->sum('jumlah_inb');

        // // penjualan        
        // $penjualan = Penjualan::whereDate('tanggal_beli', Carbon::today())->sum('barang_terjual');

        return view('admin.dashboard', compact('produksi_produk', 'bahan_terpakai', 'bahan_masuk'));
    }
}
