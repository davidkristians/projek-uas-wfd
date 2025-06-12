<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends Controller
{
    public function notifikasiForm()
    {
        return view('karyawan.notifikasi');
    }
}