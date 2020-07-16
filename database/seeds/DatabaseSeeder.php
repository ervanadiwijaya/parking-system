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

        for ($i=1; $i <= date('m'); $i++) { 
            $parkir = factory('App\Parkir', rand(10, 300))->create([
                'created_at' => date('Y-m-d H:i:s', strtotime('2020-'.$i.'-'.date('d').' 06:30:10'))
            ])->each(function($parkir) use($i){
                if ($parkir->status) {
                    $parkir->transaksi()->save(
                        factory('App\Transaksi')->make([
                            'parkir_id'     => $parkir->id,
                            'created_at'    => date('Y-m-d H:i:s', strtotime('2020-'.$i.'-'.date('d').' 17:30:10'))
                        ])
                    );
                }
            });
        }

    }
}
