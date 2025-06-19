<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Carbon\Carbon;

class RiwayatBookingUserController extends Controller
{
    public function historyBooking()
    {
        return view('user.history');
    }

    public function history()
    {
        $history = Booking::where('user_id', \Auth::user()->id)
            ->where('status', 'done')
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy(function($item) {
                return \Carbon\Carbon::parse($item->created_at)->format('d F Y');
        });
        return view('user.history', compact('history'));

    }

    public function rateBooking(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|numeric|min:1|max:5',
        ]);

        $booking = Booking::where('user_id', auth()->user()->id)->where('id', $id)->firstOrFail();
        $booking->rating = $request->input('rating');
        $booking->save();

        return redirect()->back()->with('success', 'Terima kasih atas ratingnya!');
    }
    
    // UNTUK DI BAGIAN HALAMAN PROFILE 
    public function showProfile()
{
    $user = auth()->user();

    $history = Booking::where('user_id', $user->id)
        ->where('status', 'done')
        ->orderBy('created_at', 'desc')
        ->take(2)
        ->get()
        ->groupBy(function ($item) {
            return \Carbon\Carbon::parse($item->created_at)->format('d F Y');
        });

        $bookings = Booking::where('user_id', $user->id)
        ->where('status', '!=', 'done') // hanya booking yang belum selesai
        ->where('time', '>', now())
        ->orderBy('time')
        ->get();

    return view('user.profile_user', compact('user', 'history', 'bookings'));
}



}
