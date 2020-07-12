<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = [
        'parkir_id', 'lama_parkir', 'tarif', 'bayar', 'created_at'
    ];
    public $timestamps = false;
}
