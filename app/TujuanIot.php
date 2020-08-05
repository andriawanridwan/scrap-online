<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TujuanIot extends Model
{
    protected $table = 'tb_tujuan_iot';
    protected $fillable = ['tujuan_iot'];
    public $timestamps = false;

    public function iot_keluar(){
        return $this->belongsTo('App\Iot_Keluar','tujuan');
    }

     public function srs_keluar(){
        return $this->belongsTo('App\Srs_Keluar','tujuan');
    }
}
