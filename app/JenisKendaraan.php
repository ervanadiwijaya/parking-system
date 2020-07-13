<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisKendaraan extends Model
{
    use SoftDeletes;
    protected $table = 'jenis_kendaraan';
    protected $fillable = [
        'prefix', 'name', 'tarif'
    ];
}
