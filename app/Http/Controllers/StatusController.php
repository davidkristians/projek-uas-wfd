<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class StatusController extends Controller
{
    /**
     * Menampilkan halaman status pekerjaan untuk karyawan yang sedang login.
     */
    public function statusPekerjaan()
    {
        $karyawanId = Auth::guard('karyawan')->id();

        $pekerjaan = Booking::where('karyawan_id', $karyawanId)
                              ->whereIn('status', ['unprocessed', 'on-going'])
                              ->orderBy('date', 'asc')
                              ->orderBy('time', 'asc')
                              ->get();

        return view('karyawan.status_pekerjaan', ['pekerjaan' => $pekerjaan]);
    }

    /**
     * Method baru untuk mengubah status booking.
     */
    public function updateStatus(Request $request, Booking $booking)
    {
        // 1. Keamanan: Pastikan booking ini benar-benar milik karyawan yang sedang login.
        // Ini mencegah karyawan mengubah status booking milik orang lain.
        if ($booking->karyawan_id !== Auth::guard('karyawan')->id()) {
            abort(403, 'AKSES DITOLAK.');
        }

        // 2. Validasi status baru yang dikirim dari form
        $validated = $request->validate([
            'status' => 'required|in:on-going,done'
        ]);

        // 3. Update status booking dan simpan ke database
        $booking->status = $validated['status'];
        $booking->save();

        // 4. Kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Status pekerjaan berhasil diperbarui!');
    }
}