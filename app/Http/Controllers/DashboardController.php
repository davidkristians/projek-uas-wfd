<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboardUser()
    {
        $layanans = Layanan::all(); // Ambil dari database
        return view('base.dashboard_user', compact('layanans')); // kirim ke Blade
    }

    public function showAdminDashboard()
    {
        $admin = Auth::guard('admin')->user();

        return view('base.dashboard_admin', ['admin' => $admin]);
    }
}
