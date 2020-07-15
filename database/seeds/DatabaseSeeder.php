<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(KaryawanSeeder::class);
        $this->call(JenisKendaraanSeeder::class);
        $this->call(UpahSeeder::class);
        $parkir = factory('App\Parkir', 212)->create()->each(function($parkir){
            if ($parkir->status) {
                $parkir->transaksi()->save(
                    factory('App\Transaksi')->make([
                        'parkir_id'     => $parkir->id
                    ])
                );
            }
        });
    }
}
