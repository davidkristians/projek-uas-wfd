<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RiwayatBookingUserController extends Controller
{
    public function historyBooking()
    {
        return view('user.history');
    }
}
