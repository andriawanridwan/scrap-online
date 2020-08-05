<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisHasilIot extends Model
{
    protected $table = 'tb_jenis_hasil_iot';
    protected $fillable = ['jenis_hasil_iot','harga','satuan','qty'];
    public $timestamps = false;

    public function iot_selesai(){
        return $this->hasOne('App\Iot_Selesai','jenis_hasil');
    }
    public function iot_keluar(){
        return $this->belongsTo('App\Iot_Keluar','jenis_hasil');
    }

    public function srs_selesai(){
        return $this->belongsTo('App\Srs_Selesai','jenis_hasil');
    }
    public function srs_keluar(){
        return $this->belongsTo('App\Srs_Keluar','jenis_hasil');
    }
}
