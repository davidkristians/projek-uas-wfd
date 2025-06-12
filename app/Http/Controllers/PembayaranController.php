<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function pembayaranForm()
    {
        return view('admin.pembayaran');
    }
}