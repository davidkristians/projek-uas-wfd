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
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin123'), 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User',
                'email' => 'user@example.com',
                'password' => Hash::make('user123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Karyawan',
                'email' => 'karyawan@example.com',
                'password' => Hash::make('karyawan123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
