<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class RiwayatBookingUserController extends Controller
{
    public function historyBooking()
    {
        return view('user.history');
    }

    public function history()
    {
        $history = Booking::where('user_id', \Auth::user()->id)
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

}
