<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jadwal;

class JadwalSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan Anda punya karyawan dengan ID 1 dan 2
        Jadwal::create(['karyawan_id' => 1, 'hari' => 'Senin', 'jam' => '09:00']);
        Jadwal::create(['karyawan_id' => 2, 'hari' => 'Senin', 'jam' => '15:00']);
        Jadwal::create(['karyawan_id' => 1, 'hari' => 'Selasa', 'jam' => '11:00']);
        Jadwal::create(['karyawan_id' => 2, 'hari' => 'Rabu', 'jam' => '17:00']);
        Jadwal::create(['karyawan_id' => 1, 'hari' => 'Kamis', 'jam' => '10:00']);
        Jadwal::create(['karyawan_id' => 1, 'hari' => 'Kamis', 'jam' => '15:00']);
        Jadwal::create(['karyawan_id' => 2, 'hari' => 'Jumat', 'jam' => '09:00']);
        Jadwal::create(['karyawan_id' => 2, 'hari' => 'Jumat', 'jam' => '16:00']);
        Jadwal::create(['karyawan_id' => 1, 'hari' => 'Sabtu', 'jam' => '13:00']);
        Jadwal::create(['karyawan_id' => 2, 'hari' => 'Minggu', 'jam' => '09:00']);
    }
}