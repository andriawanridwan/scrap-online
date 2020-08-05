<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TujuanSrs extends Model
{
    protected $table = 'tb_tujuan_srs';
    protected $fillable = ['tujuan_srs']; 
    public $timestamps = false;
}
