<?php

use Illuminate\Database\Seeder;
use App\JenisKendaraan;

class JenisKendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisKendaraan::insert([
            [
                'prefix'        => 'MB', 
                'name'          => 'Mobil', 
                'tarif_perjam'  => 1000,
                'tarif_awal'    => 3000,
                'tarif_max'     => 10000,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'prefix'        => 'MT', 
                'name'          => 'Motor', 
                'tarif_perjam'  => 500,
                'tarif_awal'    => 1500,
                'tarif_max'     => 5000,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);
    }
}
