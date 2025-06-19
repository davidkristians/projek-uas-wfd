<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Karyawan; // <-- Tambahkan ini
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{

    public function jadwalFormKaryawan()
    {
        // 1. Dapatkan ID karyawan yang sedang login
        $karyawanId = Auth::guard('karyawan')->id();

        // 2. Ambil semua jadwal milik karyawan tersebut dari database
        $jadwals = \App\Models\Jadwal::where('karyawan_id', $karyawanId)
                                    ->orderBy('jam', 'asc')
                                    ->get();

        // 3. Kelompokkan jadwal berdasarkan hari untuk ditampilkan di view
        $jadwalDikelompokkan = $jadwals->groupBy('hari');

        // Daftar hari untuk memastikan urutan yang benar
        $urutanHari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

        // 4. Kirim data yang sudah dikelompokkan ke view
        return view('karyawan.jadwal_kerja_karyawan', [
            'jadwalDikelompokkan' => $jadwalDikelompokkan,
            'urutanHari' => $urutanHari
        ]);
    }
    
    // Method ini tetap sama, untuk menampilkan semua jadwal
    public function JadwalForm()
    {
        $daysOfWeek = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        $jadwals = Jadwal::with('karyawan')->get()->groupBy('hari');
        return view('admin.jadwal_kerja', [
            'jadwals' => $jadwals,
            'days' => $daysOfWeek
        ]);
    }

    // METHOD BARU: Menampilkan form untuk membuat jadwal baru
    public function create()
    {
        $karyawans = Karyawan::all(); // Ambil semua karyawan untuk dropdown
        $daysOfWeek = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        return view('admin.jadwal_form', [
            'karyawans' => $karyawans,
            'days' => $daysOfWeek,
            'jadwal' => new Jadwal(), // Kirim model kosong untuk form reusability
            'action' => route('jadwal.store'),
            'method' => 'POST'
        ]);
    }

    // METHOD BARU: Menyimpan jadwal baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'hari' => 'required|string',
            'jam' => 'required',
        ]);

        Jadwal::create($request->all());

        return redirect()->route('jadwal_kerja')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    // METHOD BARU: Menampilkan form untuk mengedit jadwal
    public function edit(Jadwal $jadwal)
    {
        $karyawans = Karyawan::all();
        $daysOfWeek = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        return view('admin.jadwal_form', [
            'karyawans' => $karyawans,
            'days' => $daysOfWeek,
            'jadwal' => $jadwal, // Kirim data jadwal yang akan diedit
            'action' => route('jadwal.update', $jadwal),
            'method' => 'PUT'
        ]);
    }

    // METHOD BARU: Memperbarui jadwal di database
    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'hari' => 'required|string',
            'jam' => 'required',
        ]);

        $jadwal->update($request->all());

        return redirect()->route('jadwal_kerja')->with('success', 'Jadwal berhasil diperbarui.');
    }

    // METHOD BARU: Menghapus jadwal dari database
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal_kerja')->with('success', 'Jadwal berhasil dihapus.');
    }
}