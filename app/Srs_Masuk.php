<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Srs_Masuk extends Model
{
    protected $table = 'srs_user';
    protected $fillable = ['bulan','tanggal_date','no_dokumen','dept','workcenter','plant','qty','satuan'];
    public $timestamps = false;

    public function rel_plant(){
        return $this->hasOne('App\Plant','id','plant');
    }

    public function rel_workcenter(){
        return $this->hasOne('App\Workcenter','id','workcenter');
    }

    public function rel_dept(){
        return $this->hasOne('App\DeptIot','id','dept');
    }
}
