<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
     protected $table = 'tb_transaksi';
    protected $fillable = ['kode_transaksi','tanggal','no_spr','pembeli','penerima','barang','harga','satuan','qty','subtotal','total','bayar','kembali'];
    public $timestamps = false;
}
