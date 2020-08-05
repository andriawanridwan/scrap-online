<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeptSrs extends Model
{
    protected $table = 'tb_deptsrs';
    protected $fillable = ['deptsrs'];
    public $timestamps = false;
}
