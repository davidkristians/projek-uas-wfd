<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function laporanForm(Request $request)
    {
        $metode = $request->input('metode'); // filter metode bayar
        $filter = $request->input('filter', 'keuangan'); // default: keuangan
        $sort = $request->input('sort', 'desc'); // default: descending

        $laporanKeuangan = collect();
        $laporanLayanan = collect();
        $laporanUser = collect();

        if ($filter === 'keuangan') {
            $laporanKeuangan = Booking::with(['user', 'layanan'])
                ->when($metode, fn($q) => $q->where('payment_method', $metode))
                ->orderBy('date', 'desc')
                ->get();
        }

        if ($filter === 'layanan') {
            $laporanLayanan = Booking::select('service_id', DB::raw('COUNT(*) as total'))
                ->groupBy('service_id')
                ->with('layanan')
                ->orderBy('total', $sort) // pakai ASC/DESC dari input
                ->get();
        }

        if ($filter === 'user') {
            $laporanUser = Booking::select('user_id', DB::raw('COUNT(*) as total'))
                ->groupBy('user_id')
                ->with('user')
                ->orderBy('total', $sort)
                ->get();
        }

        return view('admin.laporan', compact(
            'laporanKeuangan', 'laporanLayanan', 'laporanUser', 'filter', 'metode', 'sort'
        ));
    }

}
