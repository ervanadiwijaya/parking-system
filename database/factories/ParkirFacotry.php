<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Parkir;
use App\JenisKendaraan;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Parkir::class, function (Faker $faker) {
    $jenis_kendaraan = JenisKendaraan::count();
    $status = [true, false];

    return [
        'jenis_kendaraan_id'    => rand(1, $jenis_kendaraan), 
        'no_polisi'             => strtoupper(str::random(1)).rand(1212, 8888).strtoupper(str::random(2)), 
        'status'                => $status[rand(0,1)], 
        'created_at'            => date('Y-m-d H:i:s', strtotime(date('Y-m-d').' 06:30:10'))
        // 'created_at'            => date('Y-m-d H:i:s', strtotime('20'.rand(13, 20).'-'.rand(10,15).'-01'.' '.'06:30:10'))
    ];
});
