<?php

namespace App\Http\Controllers;

use App\Produk;
use App\Penjualan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

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
        
        DB::beginTransaction();

        $bahan_cukup = $this->add_penjualan($request);
        
        if ($bahan_cukup == False ) {
            DB::rollback();
            return redirect()->route('admin.penjualan.index')->withErrors(['Invalid - Produk tidak cukup']);           
        }
        else {
            $penjualan = Penjualan::create([
                'tanggal_beli' => request('tanggal_beli'),
                'nama_pembeli' => request('nama_pembeli'),
                'keterangan' => request('keterangan'),
                'total_harga' => request('total'),
                ]);
                
            foreach ($request->addmore as $key => $value) {
                // masukin ke tabel penghubung
                $penjualan->Produk()->attach($value['product_id'],[
                    'harga' => $value['harga'],
                    'jumlah' => $value['jumlah'],
                ]);   
            }
         }
        DB::commit();
                         

            // // kurangin produk
            // $produk = Produk::findOrFail($value['product_id']);
            // $new_stok_produk = $produk->stok_produk - $value['jumlah'];            
            // $produk->update([
            //     'stok_produk' => $new_stok_produk,
            // ]);
         

        return redirect()->route('admin.penjualan.index');
    }

   
    public function destroy($id) {
        // cari input produk
        $penjualan = Penjualan::findOrFail($id);                
            
        // undo stok produk
        $produks = $penjualan->Produk()->get();
        foreach ($produks as $produk) {
            $produk->update([                    
                'stok_produk' => $produk->stok_produk + $produk->pivot->jumlah,
            ]);
        }

        //hapus tabel pivot
        $penjualan->Produk()->detach();

        // hapus penjualan
        $penjualan->delete();
        return redirect()->route('admin.penjualan.index');
    }


    public function pdf(){
        $penjualan = Penjualan::all();
        return view('admin.laporan.laporan', compact('penjualan'));
    }

    
    public function cetak_pdf()
    {
        //INISIASI 30 HARI RANGE SAAT INI JIKA HALAMAN PERTAMA KALI DI-LOAD
        //KITA GUNAKAN STARTOFMONTH UNTUK MENGAMBIL TANGGAL 1
        $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        //DAN ENDOFMONTH UNTUK MENGAMBIL TANGGAL TERAKHIR DIBULAN YANG BERLAKU SAAT INI
        $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

        //JIKA USER MELAKUKAN FILTER MANUAL, MAKA PARAMETER DATE AKAN TERISI
        if (request()->date != '') {
            //MAKA FORMATTING TANGGALNYA BERDASARKAN FILTER USER
            $date = explode(' - ' ,request()->date);
            $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
            $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';
        }

        //BUAT QUERY KE DB MENGGUNAKAN WHEREBETWEEN DARI TANGGAL FILTER
        $jual = Penjualan::whereBetween('created_at', [$start, $end])->get();
        //KEMUDIAN LOAD VIEW
        return view('admin.laporan.laporan', compact('jual'));
    }

    public function ReportPdf($daterange)
    {
        $date = explode('+', $daterange); //EXPLODE TANGGALNYA UNTUK MEMISAHKAN START & END
        //DEFINISIKAN VARIABLENYA DENGAN FORMAT TIMESTAMPS
        $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
        $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';

        //KEMUDIAN BUAT QUERY BERDASARKAN RANGE CREATED_AT YANG TELAH DITETAPKAN RANGENYA DARI $START KE $END
        $jual = Penjualan::whereBetween('created_at', [$start, $end])->get();
        //LOAD VIEW UNTUK PDFNYA DENGAN MENGIRIMKAN DATA DARI HASIL QUERY
        $pdf = PDF::loadView('admin.laporan.laporan_pdf', compact('jual', 'date'));
        //GENERATE PDF-NYA
        return $pdf->stream();
    }

    private function add_penjualan($request) {

        // kurangin produk
        foreach ($request->addmore as $key => $value) {
        $produk = Produk::findOrFail($value['product_id']);
        $new_stok_produk = $produk->stok_produk - $value['jumlah'];            
        $produk->update([
            'stok_produk' => $new_stok_produk,
        ]);
        }
    }
}