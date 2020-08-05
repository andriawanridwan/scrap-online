<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workcenter extends Model
{
    protected $table = 'tb_workcenter';
    protected $fillable = ['workcenter'];
    public $timestamps = false;

    public function iotmasuk(){
        return $this->belongsTo('App\Iot_Masuk','workcenter');
    }
}
