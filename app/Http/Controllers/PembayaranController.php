<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class PembayaranController extends Controller
{
    public function pembayaranForm()
    {
        // Ambil semua data booking yang status-nya 'done' dan ikut sertakan relasi user & layanan
        $bookings = Booking::with(['user', 'layanan'])
            ->where('status', 'done')
            ->orderByDesc('date')
            ->get();

        // Kirim data ke view
        return view('admin.pembayaran', compact('bookings'));
    }
}
