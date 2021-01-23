<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InputProduk extends Model
{
    protected $table = 'inputproduks';
    
    protected $fillable = ['product_id', 'jumlah_inp', 'tanggal_inp', 'tanggal_out'];

    public function Produk() {
        return $this->belongsTo('App\Produk', 'product_id', 'id');
    }
}
