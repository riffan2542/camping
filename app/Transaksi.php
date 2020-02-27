<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    public function pemesanan()
    {
        return $this->belongsTo('App\Pemesanan', 'pemesanan_id');
    }
    public function stokbarang()
    {
        return $this->belongsTo('App\Stokbarang', 'stokbarang_id');
    }
    public function pengembalian()
    {
        return $this->belongsTo('App\Pengembalian', 'pengembalian_id');
    }
}
