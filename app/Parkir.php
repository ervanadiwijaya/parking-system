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

    public static function booted(){
        static::retrieved(function($parkir){
            $jenis = $parkir->jenis()->first();
            $parkir->kode_parkir = 'P'.$jenis->prefix.'-'.str_pad($parkir->id, 5, '0', STR_PAD_LEFT);
        }); 
    }
    // constraint 
    public function jenis(){
        return $this->belongsTo('App\JenisKendaraan', 'jenis_kendaraan_id');
    }

    public function transaksi(){
        return $this->hasOne('App\Transaksi', 'parkir_id');
    }

}
