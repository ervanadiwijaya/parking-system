<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transaksi;
use Faker\Generator as Faker;

$factory->define(Transaksi::class, function (Faker $faker) {
    return [
        'lama_parkir'   => rand(1, 800), 
        'tarif'         => rand(500, 2000), 
        'tagihan'       => rand(2000, 10000), 
        'created_at'    => date('Y-m-d H:i:s', strtotime(date('Y-m-d').' 13:30:10'))
    ];
});
