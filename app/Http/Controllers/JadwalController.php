<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function JadwalForm()
    {
        return view('admin.jadwal_kerja');
    }

    public function JadwalFormKaryawan()
    {
        return view('karyawan.jadwal_kerja_karyawan');
    }
}