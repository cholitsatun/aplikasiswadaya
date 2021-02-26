<?php

namespace App;

use App\Produk;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualans';
    protected $fillable = ['product_id', 'nama_pembeli', 'keterangan', 'total_harga', 'tanggal_beli'];

    public function Produk() {
        return $this->belongsToMany('App\Produk', 'penjualan_produk', 'penjualan_id','product_id');

    }
}
