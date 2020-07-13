<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parkir extends Model
{
    protected $table = 'parkir';
    protected $fillable = [
        'jenis_kendaraan_id', 'name', 'no_polisi', 'status', 'created_at'
    ];
    public $timestamps = false;
}
