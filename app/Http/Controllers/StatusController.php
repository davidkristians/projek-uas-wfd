<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
    public function statusPekerjaan()
    {
        return view('karyawan.status_pekerjaan');
    }
}