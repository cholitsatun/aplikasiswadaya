<?php

namespace App;

use App\Produk;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualans';
    protected $fillable = ['product_id', 'nama_pembeli', 'barang_terjual', 'keterangan', 'total_harga', 'tanggal_beli'];

    public function Produk() {
        return $this->belongsTo('App\Produk', 'product_id', 'id');
    }
}
