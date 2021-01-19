<?php

namespace App;

use App\BahanBaku;
use App\Penjualan;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = ['nama_produk', 'stok_produk', 'harga', 'tanggal_jadi'];

    public function Penjualan(){
        return $this->hasMany('App\Penjualan', 'id', 'id');
     }
     public function BahanBaku(){
        return $this->hasMany('App\BahanBaku', 'id', 'id');
     }
}   
