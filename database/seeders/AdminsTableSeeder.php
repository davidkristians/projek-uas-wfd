<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert ke tabel karyawans, dengan user_id dari atas
        DB::table('admins')->insert([
            [
                'nama' => 'Admin Satu',
                'email' => 'admin11@gmail.com',
                'alamat_rumah' => 'Jalan Admin No. 1',
                'nomor_telepon' => '08123456789',
                'jenis_kelamin' => 'Laki-laki',
                'tanggal_mulai_bekerja' => '2025-06-01',
                'password' => Hash::make('admin1123'),
            ],
            [
                'nama' => 'Admin Dua',
                'email' => 'admin2@gmail.com',
                'alamat_rumah' => 'Jalan Admin No. 2',
                'nomor_telepon' => '08123454567810',
                'jenis_kelamin' => 'Perempuan',
                'tanggal_mulai_bekerja' => '2025-06-14',
                'password' => Hash::make('admin222'),
            ],
        ]);
    }
}
