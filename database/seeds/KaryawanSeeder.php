<?php

use Illuminate\Database\Seeder;
use App\User;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name'      => 'Mimin',
                'email'     => 'admin@admin.com',
                'role'      => 'admin',
                'password'  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'name'      => 'Kevin Adam',
                'email'     => 'Kevin@mail.com',
                'role'      => 'petugas',
                'password'  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'name'      => 'Ervan Adi Wijaya',
                'email'     => 'ervan@admin.com',
                'role'      => 'petugas',
                'password'  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'name'      => 'Yanuar Afendi',
                'email'     => 'yanuar@admin.com',
                'role'      => 'petugas',
                'password'  => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
        ]);
    }
}
