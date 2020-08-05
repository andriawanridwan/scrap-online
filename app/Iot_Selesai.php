<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iot_Selesai extends Model
{
    protected $table = 'iot_admin';
    protected $fillable = ['tanggal_selesai','no_rbap','tanggal_rbap','produk_kemasan','jenis_hasil','qty','satuan'];
    public $timestamps = false;

    public function jenishasil(){
        return $this->hasOne('App\JenisHasilIot','id','jenis_hasil');
    }
}
