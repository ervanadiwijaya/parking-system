<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upah extends Model
{
    protected $table = 'upah';
    protected $fillable = [
        'role', 'gaji_pokok', 'tunjangan_makan', 'tunjangan_transport'
    ];

}
