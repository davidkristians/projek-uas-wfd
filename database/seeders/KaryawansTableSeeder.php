<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KaryawansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert ke tabel karyawans, dengan user_id dari atas
        DB::table('karyawans')->insert([
            [
                'nama' => 'Karyawan Satu',
                'email' => 'karyawan1@gmail.com',
                'alamat_rumah' => 'Jalan Contoh No. 1',
                'nomor_telepon' => '08123456789',
                'jenis_kelamin' => 'Laki-laki',
                'tanggal_mulai_bekerja' => '2025-06-20',
                'password' => Hash::make('password123'),
            ],
            [
                'nama' => 'Karyawan Dua',
                'email' => 'karyawan2@gmail.com',
                'alamat_rumah' => 'Jalan Contoh No. 2',
                'nomor_telepon' => '081234567810',
                'jenis_kelamin' => 'Perempuan',
                'tanggal_mulai_bekerja' => '2025-06-14',
                'password' => Hash::make('password123'),
            ],
        ]);
    }
}
