<?php

namespace App;

use App\Produk;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualans';
    protected $fillable = ['nama_pembeli', 'barang_terjual', 'keterangan', 'total_harga', 'tanggal_beli'];

    public function Produk() {
        return $this->belongsTo('App\Produk', 'id', 'id');
    }
}
