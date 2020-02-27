<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    public function transaksi()
    {
        return $this->hasMany('App\Transaksi', 'stokbarang_id');
    }
}
