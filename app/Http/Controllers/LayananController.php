<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Layanan;

class LayananController extends Controller
{
    public function layananForm()
    {
        return view('admin.layanan')->with('layanans', Layanan::all());
    }


    // Tambah 
    public function tambahLayanan(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'icon_svg' => 'required|string'
        ]);

        Layanan::create($request->all());
        return redirect('/base/dashboard_admin')->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function updateLayanan(Request $request, $id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->update($request->all());

        return redirect('/base/dashboard_admin')->with('success', 'Layanan berhasil diperbarui.');
    }

    public function hapusLayanan($id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->delete();

        return redirect('/base/dashboard_admin')->with('success', 'Layanan berhasil dihapus.');
    }

    public function show($id)
    {
        $layanan = \App\Models\Layanan::findOrFail($id);
        return response()->json($layanan);
    }
}