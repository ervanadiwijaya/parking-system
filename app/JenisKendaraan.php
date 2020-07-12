<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisKendaraan extends Model
{
    use SoftDeletes;
    protected $table = 'jenis_kendaraan';
    protected $fillable = [
        'prefix', 'name', 'tarif'
    ];
}
