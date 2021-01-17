<?php

namespace App;

use App\Produk;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $fillable = ['nama_pembeli', 'barang_terjual', 'keterangan', 'total_harga'];

    public function Produk() {
        return $this->belongsTo('App\Produk', 'id_produk', 'id_transaksi');
    }
}