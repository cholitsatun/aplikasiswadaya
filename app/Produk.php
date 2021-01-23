<?php

namespace App;

use App\BahanBaku;
use App\Penjualan;
use App\InputProduk;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = ['nama_produk', 'stok_produk', 'harga', 'tanggal_jadi'];

    public function Penjualan(){
        return $this->hasMany('App\Penjualan', 'id', 'id');
     }
     public function InputProduk(){
        return $this->hasMany('App\Produk', 'product_id', 'id');
     }
     public function BahanBaku(){
      return $this->belongsToMany('App\BahanBaku', 'produk_bahan', 'product_id', 'bahan_id')->withPivot('jumlah_bahan');
      }
}   
