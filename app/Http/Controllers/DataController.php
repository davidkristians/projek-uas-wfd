<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
{
    public function dataForm()
    {
        return view('admin.data_page');
    }
}