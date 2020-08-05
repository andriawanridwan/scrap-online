<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeptIot extends Model
{
    protected $table = 'tb_deptiot';
    protected $fillable = ['deptiot'];
    public $timestamps = false;

    public function iotmasuk(){
        return $this->belongsTo('App\Iot_Masuk','dept');
    }
     
    public function srsmasuk(){
        return $this->belongsTo('App\Srs_Masuk','dept');
    }
}
