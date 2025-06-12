<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function riwayatKaryawan()
    {
        return view('karyawan.riwayat_karyawan');
    }
}