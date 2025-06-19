<?php

namespace App\Http\Controllers;

// Import semua kelas yang kita butuhkan
use App\Models\Booking;
use App\Models\Layanan;
use App\Models\Jadwal;
use App\Models\Karyawan; // <-- Tambahkan ini untuk relasi
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon; 
use App\Models\Notification;

class BookingController extends Controller
{
    /**
     * Menyimpan booking baru dan menugaskan karyawan secara otomatis.
     */
    public function store(Request $request)
    {
        // 1. Validasi input dari user
        $validatedData = $request->validate([
            'service_id' => 'required|exists:layanans,id',
            'location' => 'required|string|max:255',
            'date' => 'required|date_format:Y-m-d',
            'time' => 'required|date_format:H:i',
            'payment_method' => 'required|in:cod,e-money,debit,bank-transfer',
        ]);

        // 2. Dapatkan data pendukung
        $user = Auth::guard('web')->user();
        $layanan = Layanan::findOrFail($validatedData['service_id']);
        $timeWithSeconds = $validatedData['time'] . ':00'; // Tambah detik agar cocok dengan format DB

        // --- LOGIKA BARU UNTUK PENUGASAN KARYAWAN OTOMATIS ---
        $dayOfWeek = Carbon::parse($validatedData['date'])->format('l');
        $dayMap = ['Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu', 'Sunday' => 'Minggu'];
        $hariIndonesia = $dayMap[$dayOfWeek];

        $karyawanOnDutyIds = Jadwal::where('hari', $hariIndonesia)->where('jam', $timeWithSeconds)->pluck('karyawan_id')->toArray();
        $karyawanBookedIds = Booking::where('date', $validatedData['date'])->where('time', '>=', $timeWithSeconds)->pluck('karyawan_id')->toArray();
        $availableKaryawanIds = array_diff($karyawanOnDutyIds, $karyawanBookedIds);

        if (empty($availableKaryawanIds)) {
            return response()->json(['success' => false, 'message' => 'Maaf, slot waktu ini baru saja terisi. Silakan pilih slot lain.'], 409);
        }

        $assignedKaryawanId = $availableKaryawanIds[array_rand($availableKaryawanIds)];

        Booking::create([
            'user_id' => $user->id,
            'service_id' => $validatedData['service_id'],
            'karyawan_id' => $assignedKaryawanId,
            'location' => $validatedData['location'],
            'date' => $validatedData['date'],
            'time' => $timeWithSeconds,
            'payment_method' => $validatedData['payment_method'],
            'status' => 'unprocessed',
            'user_name' => $user->name,
            'service_name' => $layanan->nama,
            'service_price' => $layanan->harga
        ]);

        Notification::create([
            'karyawan_id' => $assignedKaryawanId,
            'message' => "Anda mendapatkan tugas baru (Otomatis): {$layanan->nama} untuk customer {$user->name}.",
            'link' => route('status_pekerjaan')
        ]);

        return response()->json(['success' => true, 'message' => 'Booking created successfully!']);
    }

    /**
     * API untuk mengambil slot waktu yang tersedia berdasarkan tanggal.
     */
    public function getAvailableSlots(Request $request)
    {
        $request->validate(['date' => 'required|date_format:Y-m-d']);
        $date = $request->input('date');

        $dayOfWeek = Carbon::parse($date)->format('l');
        $dayMap = ['Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu', 'Sunday' => 'Minggu'];
        $hari = $dayMap[$dayOfWeek];

        $jadwalSlots = Jadwal::where('hari', $hari)->get();
        $existingBookings = Booking::where('date', $date)->get();
        $availableSlots = [];
        $slotsOnDuty = $jadwalSlots->groupBy('jam');

        foreach ($slotsOnDuty as $jam => $jadwals) {
            $totalKaryawanOnDuty = $jadwals->count();
            $bookedCount = $existingBookings->where('time', $jam)->count();

            if ($totalKaryawanOnDuty > $bookedCount) {
                $formattedJam = Carbon::parse($jam)->format('H:i');
                $availableSlots[] = $formattedJam;
            }
        }
        sort($availableSlots);
        return response()->json($availableSlots);
    }

    /**
     * Menampilkan halaman "My Booking" untuk user.
     */
    public function userBooking()
    {
        $bookings = Booking::where('user_id', Auth::id())
            ->whereIn('status', ['on-going', 'unprocessed'])
            ->with('karyawan')
            ->orderBy('date', 'asc')
            ->get();

        $bookings->each(function ($booking) {
            $booking->nama_karyawan = $booking->karyawan->nama ?? 'Belum Dijadwalkan';
        });

        return view('user.my_bookings', compact('bookings'));
    }
}