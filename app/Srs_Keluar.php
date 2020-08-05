<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Srs_Keluar extends Model
{
    protected $table = 'srs_gudang';
    protected $fillable = ['tanggal_keluar','tujuan','jenis_transaksi','kategori_pengurangan','no_spr','qty','satuan','kategori','keterangan'];
    public $timestamps = false;

    public function rel_tujuan(){
        return $this->hasOne('App\TujuanIot','id','tujuan');
    }
}
