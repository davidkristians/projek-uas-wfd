<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Karyawan;
use App\Models\User;
use App\Models\Admin;

class DataController extends Controller
{
    public function dataForm(Request $request)
    {
        $filter = $request->input('filter', 'Karyawan');
        $order = $request->input('order', 'Ascending');

        switch ($filter) {
            case 'Admin':
                $data = Admin::orderBy('nama', $order == 'Ascending' ? 'asc' : 'desc')->get();
                break;
            case 'User':
                $data = User::orderBy('name', $order == 'Ascending' ? 'asc' : 'desc')->get();
                break;
            default:
                $data = Karyawan::orderBy('nama', $order == 'Ascending' ? 'asc' : 'desc')->get();
                break;
        }

        return view('admin.data_page', compact('data', 'filter', 'order'));
    }

    // Tampilkan semua karyawan
   public function showListKaryawan(Request $request)
    {
        $filter = 'Karyawan'; // Tetapkan filter default untuk fungsi ini
        $order = $request->input('order', 'Ascending');
        $data = Karyawan::orderBy('nama', $order == 'Ascending' ? 'asc' : 'desc')->get();
        return view('admin.data_page', compact('data', 'filter', 'order'));
    }

    public function showListAdmin(Request $request)
    {
        $filter = 'Admin'; // Tetapkan filter default untuk fungsi ini
        $order = $request->input('order', 'Ascending');
        $data = Admin::orderBy('nama', $order == 'Ascending' ? 'asc' : 'desc')->get();
        return view('admin.data_page', compact('data', 'filter', 'order'));
    }

    public function showListUser(Request $request)
    {
        $filter = 'User'; // Tetapkan filter default untuk fungsi ini
        $order = $request->input('order', 'Ascending');
        $data = User::orderBy('nama', $order == 'Ascending' ? 'asc' : 'desc')->get();
        return view('admin.data_page', compact('data', 'filter', 'order'));
    }
}