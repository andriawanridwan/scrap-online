<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisHasilSrs extends Model
{
    protected $table = 'tb_jenis_hasil_srs';
    protected $fillable = ['jenis_hasil_srs','harga','satuan'];
    public $timestamps = false;
}
