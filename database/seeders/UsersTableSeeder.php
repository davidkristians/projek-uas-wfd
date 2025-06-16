<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Tedi',
                'email' => 'Tedi@gmail.com',
                'password' => Hash::make('tedi123'), 
                'alamat' => 'Jalan abc No. 1',
                'nomor_telepon' => '0823729144',
                'jenis_kelamin' => 'Laki-laki',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User',
                'email' => 'user@example.com',
                'password' => Hash::make('user123'),
                'alamat' => 'Jalan user No. 1',
                'nomor_telepon' => '08123456789',
                'jenis_kelamin' => 'Laki-laki',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ayu',
                'email' => 'ayu@example.com',
                'password' => Hash::make('ayu123'),
                'alamat' => 'Jalan siwalankerto No. 1',
                'nomor_telepon' => '089361843',
                'jenis_kelamin' => 'Perempuan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
