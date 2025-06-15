<?php

namespace App\Http\Controllers;

use App\Models\Layanan;

class DashboardController extends Controller
{
    public function dashboardUser()
    {
        $layanans = Layanan::all(); // Ambil dari database
        return view('base.dashboard_user', compact('layanans')); // kirim ke Blade
    }
}
