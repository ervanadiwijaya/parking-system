<?php

use Illuminate\Database\Seeder;
use App\Upah;

class UpahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Upah::insert([
            [
                'role'                  => 'admin', 
                'gaji_pokok'            => 4900000, 
                'tunjangan_makan'       => 100000,
                'tunjangan_transport'   => 300000,
                'created_at'            => now(),
                'updated_at'            => now(),
            ],
            [
                'role'                  => 'petugas', 
                'gaji_pokok'            => 4500000, 
                'tunjangan_makan'       => 100000,
                'tunjangan_transport'   => 300000,
                'created_at'            => now(),
                'updated_at'            => now(),
            ],
        ]);
    }
}
