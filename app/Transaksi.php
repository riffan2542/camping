<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    public function pengembalian()
    {
        return $this->belongsTo('App\Pengembalian', 'pengembalian_id');
    }
    public function stokbarang()
    {
    return $this->belongsToMany('App\Stokbarang', 'transaksi_stokbarangs', 'transaksi_id', 'stokbarang_id');
    }
}
