<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parkir extends Model
{
    protected $table = 'parkir';
    protected $fillable = [
        'jenis_kendaraan_id', 'no_polisi', 'status', 'created_at'
    ];
    public $timestamps = false;

    // constraint 
    public function jenis(){
        return $this->belongsTo('App\JenisKendaraan', 'jenis_kendaraan_id');
    }
}
