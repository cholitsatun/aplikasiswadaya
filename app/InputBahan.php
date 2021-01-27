<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InputBahan extends Model
{
    protected $table = 'inputbahans';
    protected $fillable = ['bahanbaku_id', 'supplier', 'jumlah_inb', 'tanggal_inb', 'tanggal_out'];

    public function BahanBaku() {
        return $this->belongsTo('App\BahanBaku', 'bahanbaku_id', 'id');
    }

}
