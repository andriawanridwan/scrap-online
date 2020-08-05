<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $table = 'tb_plant';
    protected $fillable = ['plant'];
    public $timestamps = false;


    public function iotmasuk(){
        return $this->belongsTo('App\Iot_Masuk','plant');
    }

     public function srsmasuk(){
        return $this->belongsTo('App\Srs_Masuk','plant');
    }
}
