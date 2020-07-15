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
<<<<<<< Updated upstream
=======
<<<<<<< Updated upstream

        $parkir = factory('App\Parkir', 212)->create()->each(function($parkir){
            if ($parkir->status) {
                $parkir->transaksi()->save(
                    factory('App\Transaksi')->make([
                        'parkir_id'     => $parkir->id
                    ])
                );
            }
        });
=======
        $this->call(UpahSeeder::class);

>>>>>>> Stashed changes
>>>>>>> Stashed changes
    }
}
