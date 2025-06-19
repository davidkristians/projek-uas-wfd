<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Karyawan;
use App\Models\Notification;

class BookingManagementController extends Controller
{
    /**
     * Menampilkan halaman untuk menugaskan booking.
     */
    public function index()
    {
        // Ambil semua booking yang belum diproses dan belum ditugaskan karyawan
        $unassignedBookings = Booking::where('status', 'unprocessed')
                                    ->whereNull('karyawan_id')
                                    ->with('user') // Ambil data user untuk ditampilkan
                                    ->orderBy('date', 'asc')
                                    ->get();

        // Ambil semua karyawan untuk ditampilkan di dropdown
        $karyawans = Karyawan::all();

        return view('admin.manage_bookings', [
            'bookings' => $unassignedBookings,
            'karyawans' => $karyawans
        ]);
    }

    /**
     * Menyimpan penugasan karyawan ke sebuah booking.
     */
    public function assign(Request $request, Booking $booking)
    {
        // Validasi input
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id'
        ]);

        // Update booking dengan karyawan_id yang dipilih
        $booking->karyawan_id = $request->input('karyawan_id');
        $booking->save();


        return redirect()->route('admin.bookings.index')->with('success', 'Karyawan berhasil ditugaskan!');
    }
}