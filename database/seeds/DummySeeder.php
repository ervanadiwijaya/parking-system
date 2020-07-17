<?php

use Illuminate\Database\Seeder;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= date('m'); $i++) { 
            $parkir = factory('App\Parkir', rand(10, 300))->create([
                'created_at' => date('Y-m-d H:i:s', strtotime('2020-'.$i.'-'.date('d', strtotime('-1 days')).' 06:30:10'))
            ])->each(function($parkir) use($i){
                if ($parkir->status) {
                    $parkir->transaksi()->save(
                        factory('App\Transaksi')->make([
                            'parkir_id'     => $parkir->id,
                            'created_at'    => date('Y-m-d H:i:s', strtotime('2020-'.$i.'-'.date('d', strtotime('-1 days')).' 17:30:10'))
                        ])
                    );
                }
            });
        }
    }
}
