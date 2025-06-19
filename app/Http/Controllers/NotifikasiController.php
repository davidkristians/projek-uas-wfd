<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification; // <-- Pastikan ini ada

class NotifikasiController extends Controller
{
    public function notifikasiForm()
    {
        // Ambil notifikasi untuk karyawan yang sedang login
        $karyawanId = Auth::guard('karyawan')->id();
        $notifications = Notification::where('karyawan_id', $karyawanId)
                                    ->orderBy('created_at', 'desc') // Tampilkan yang terbaru di atas
                                    ->get();

        return view('karyawan.notifikasi', compact('notifications'));
    }
}