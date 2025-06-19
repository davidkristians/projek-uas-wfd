<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking; // <-- INI BARIS YANG MEMPERBAIKI ERROR ANDA


class RiwayatController extends Controller
{
    public function riwayatKaryawan()
    {
        // 1. Dapatkan ID karyawan yang sedang login
        $karyawanId = Auth::guard('karyawan')->id();

        // 2. Ambil semua booking yang statusnya 'done' milik karyawan ini
        $riwayatPekerjaan = Booking::where('karyawan_id', $karyawanId)
                                    ->where('status', 'done')
                                    ->orderBy('date', 'desc') // Urutkan dari yang terbaru
                                    ->get();

        // 3. Kirim data ke view
        return view('karyawan.riwayat_karyawan', ['pekerjaanSelesai' => $riwayatPekerjaan]);
    }
}