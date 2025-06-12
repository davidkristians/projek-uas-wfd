<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LayananController extends Controller
{
    public function layananForm()
    {
        return view('admin.layanan');
    }
}