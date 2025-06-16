<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        try {
            if (!Auth::guard('web')->check()) {
                return response()->json(['success' => false, 'message' => 'Please log in to book a service.'], 401);
            }

            $validatedData = $request->validate([
                'service_id' => 'required|exists:layanans,id',
                'location' => 'required|string|max:255',
                'date' => 'required|date',
                'time' => 'required',
                'payment_method' => 'required|in:cod,e-money,debit,bank-transfer'
            ]);

            $user = Auth::guard('web')->user();
            $layanan = Layanan::findOrFail($validatedData['service_id']);

            $booking = Booking::create([
                'user_id' => $user->id,
                'service_id' => $validatedData['service_id'],
                'location' => $validatedData['location'],
                'date' => $validatedData['date'],
                'time' => $validatedData['time'],
                'payment_method' => $validatedData['payment_method'],
                'status' => 'unprocessed',
                'user_name' => $user->name, // Isi nama user
                'service_name' => $layanan->nama, // Isi nama layanan
                'service_price' => $layanan->harga // Isi harga layanan
            ]);

            return response()->json(['success' => true, 'message' => 'Booking created successfully!']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['success' => false, 'message' => 'Validation failed: ' . implode(', ', $e->errors())], 422);
        } catch (\Exception $e) {
            \Log::error('Booking Error: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'An error occurred. Please try again.'], 500);
        }
    }


    public function userBooking()
    {
        $userId = Auth::id();

        $bookings = DB::table('bookings')
            ->where('bookings.user_id', Auth::id())
            ->whereIn('bookings.status', ['on-going', 'unprocessed'])
            ->leftJoin('jadwals', DB::raw('HOUR(bookings.time)'), '=', DB::raw('HOUR(jadwals.jam)'))
            ->leftJoin('karyawans', 'jadwals.karyawan_id', '=', 'karyawans.id')
            ->select(
                'bookings.id',
                'bookings.date',
                'bookings.time',
                'bookings.status',
                'bookings.service_price',
                DB::raw('MIN(karyawans.nama) as nama_karyawan') // ambil 1 nama saja
            )
            ->groupBy(
                'bookings.id',
                'bookings.date',
                'bookings.time',
                'bookings.status',
                'bookings.service_price'
            )
            ->get();
        return view('user.my_bookings', compact('bookings'));
    }
}
