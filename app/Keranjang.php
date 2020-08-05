<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
     protected $table = 'tb_keranjang';
    protected $fillable = ['barang','harga','satuan','qty'];
    public $timestamps = false;
}
