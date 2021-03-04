<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\InputBahan;
use App\InputProduk;
use App\Penjualan;
use App\Produk;
use App\BahanBaku;


class DashboardController extends Controller
{
    public function cek(){
        $produk = Produk::find(1);                
        //bahan bakunya apa aja
        $bahans = $produk->BahanBaku;                            
        dd($bahans);
    }

    public function index(){        
        // tangaal mulai dan akhir
        $now = Carbon::now();
        $from = $now->startOfWeek()->toDateString(); 
        $to = $now->endOfWeek()->toDateString(); 


        // dapatkan jumlah produksi total semua produk
        $total_produksi_produk = InputProduk::whereBetween('tanggal_inp', [$from, $to])->sum('jumlah_inp');
        // macam produksi dan jumlah produksi tiap poduk
        $produksi_produk = [];
        $produk_ids = InputProduk::whereBetween('tanggal_inp', [$from, $to])->distinct()->get(['product_id'])->toArray();                         
        foreach ($produk_ids as $produk_id) {                        
            $jumlah = InputProduk::whereBetween('tanggal_inp', [$from, $to])->where('product_id', $produk_id['product_id'])->sum('jumlah_inp');                      
            $produk = Produk::where('id', $produk_id['product_id'])->first()->toArray();
            array_push(
                $produksi_produk, 
                [
                    'nama_produk' => $produk['nama_produk'], 
                    'jumlah' => $jumlah]
                );            
        }        
        
        
        // dapatkan jumlah total bahan baku yang terpakai
        $input_produks = InputProduk::whereBetween('tanggal_inp', [$from, $to])->get();       
        $total_bahan_terpakai = 0;        
        # setiap input produk pada minggu ini
        foreach ($input_produks as $input_produk) {
            // setiap jumlah input produk tersebut            
            for ($i=0; $i < $input_produk->jumlah_inp ; $i++) { 
                // produknya apa                
                $produk = Produk::find($input_produk->product_id);                
                //bahan bakunya apa aja
                $bahans = $produk->BahanBaku()->get();                                            
                // untuk setiap bahan baku yang terpakai, tambahkan ke bahan terpakai                
                foreach ($bahans as $bahan){                                                    
                    $total_bahan_terpakai += $bahan->pivot->jumlah_bahan;
                }            
            }
        }        


        // bahan terpakai
        $bahans_terpakai = [];        
        $i = 0;
        $produk_ids = InputProduk::whereBetween('tanggal_inp', [$from, $to])->distinct()->get(['product_id'])->toArray();                         
        foreach ($produk_ids as $produk_id) {                        
            // jumlah produk
            $jumlah_produk = InputProduk::whereBetween('tanggal_inp', [$from, $to])->where('product_id', $produk_id['product_id'])->sum('jumlah_inp');                      
            // produknya
            $produk = Produk::find($produk_id['product_id']);
            // bahan-bahan produk
            $bahans = $produk->BahanBaku()->get();
            // untuk setiap bahan baku yang terpakai, tambahkan ke bahan terpakai
            foreach ($bahans as $bahan){                               
                if (array_key_exists($bahan->nama_bahan, $bahans_terpakai)) {
                    $bahans_terpakai[$bahan->nama_bahan]['jumlah'] += $bahan->pivot->jumlah_bahan * $jumlah_produk;
                }
                else {                    
                    $bahans_terpakai[$bahan->nama_bahan] =  [
                        'no' => $i+1,
                        'nama_bahan' => $bahan->nama_bahan, 
                        'jumlah' => $bahan->pivot->jumlah_bahan * $jumlah_produk,
                    ];
                    $i++;
                }
                
            }                
        }                        
        

        // dapatkan bahan baku yang masuk
        $total_bahan_masuk = InputBahan::whereBetween('tanggal_inb', [$from, $to])->sum('jumlah_inb');
        $bahans_masuk = [];
        $bahanbaku_ids = InputBahan::whereBetween('tanggal_inb', [$from, $to])->distinct()->get(['bahanbaku_id'])->toArray();                         
        foreach ($bahanbaku_ids as $bahanbaku_id) {                        
            $jumlah = InputBahan::whereBetween('tanggal_inb', [$from, $to])->where('bahanbaku_id', $bahanbaku_id['bahanbaku_id'])->sum('jumlah_inb');                      
            $bahan = BahanBaku::where('id', $bahanbaku_id['bahanbaku_id'])->first()->toArray();
            array_push(
                $bahans_masuk, 
                [
                    'nama_bahan' => $bahan['nama_bahan'], 
                    'jumlah' => $jumlah]
                );            
        }        


        // total penjualan
        $total_penjualan = 0;

        // penjualan tiap produk       
        $produks_terjual = [];        
        $i = 0;
        $penjualan_ids = Penjualan::whereBetween('created_at', [$from, $to])->distinct()->get(['id'])->toArray();                                 
        foreach ($penjualan_ids as $penjualan_id) {                                    
            // Penjualannya
            $penjualan = Penjualan::find($penjualan_id['id']);
            // produk
            $produks = $penjualan->Produk()->get();
            // untuk setiap produk yang terjual, tambahkan ke produk terjual
            foreach ($produks as $produk){                               
                if (array_key_exists($produk->nama_produk, $produks_terjual)) {
                    $produks_terjual[$produk->nama_produk]['jumlah'] += $produk->pivot->jumlah;
                }
                else {                    
                    $produks_terjual[$produk->nama_produk] =  [
                        'no' => $i+1,
                        'nama_produk' => $produk->nama_produk, 
                        'jumlah' => $produk->pivot->jumlah,
                    ];
                    $i++;
                }
                // total penjualan
                $total_penjualan += $produk->pivot->jumlah;
            }                
        }        


        return view('admin.dashboard', compact(
            'total_produksi_produk', 
            'produksi_produk',            
            'total_bahan_terpakai', 
            'bahans_terpakai',
            'total_bahan_masuk', 
            'bahans_masuk',
            'total_penjualan',
            'produks_terjual'
        ));
    }
}
