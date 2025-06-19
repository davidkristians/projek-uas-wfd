<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Karyawan;

class RegisterController extends Controller
{
    // User
    public function registerForm()
    {
        return view('login.register');
    }

    // User
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|min:5|max:40',
            'email' => [
                'required',
                'email',
                'regex:/^[\w\.\-]+@([\w\-]+\.)+com$/',
                'unique:users,email',
            ],
            'password' => 'required|min:6',
            'nomor_telepon' => [
                'required',
                'regex:/^(\\+62|08)[0-9]{8,13}$/'
            ],
            'alamat' => [
                'required',
                'string',
                'min:6',
                'max:50',
                'regex:/^(?=.*[a-zA-Z])(?=.*\d)(?=.{6,80}$)[a-zA-Z0-9\s.,\-\/#]+$/'
            ],
            'jenis_kelamin' => 'required',
        ]);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'nomor_telepon' => $validatedData['nomor_telepon'],
            'alamat' => $validatedData['alamat'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
        ]);

        return redirect('/login')->with('success', 'Registration Successful!');
    }


    // Admin (form tambah karyawan)
    public function registerKaryawan()
    {
        return view('admin.tambah_karyawan');
    }

    // Simpan data karyawan
    public function simpanRegisterKaryawan(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|min:5|max:40',
            'alamat_rumah' => [
                'required',
                'string',
                'min:6',
                'max:50',
                'regex:/^(?=.*[a-zA-Z])(?=.*\d)(?=.{6,80}$)[a-zA-Z0-9\s.,\-\/#]+$/'
            ],
            'nomor_telepon' => [
                'required',
                'regex:/^(\\+62|08)[0-9]{8,13}$/'
            ],
            'jenis_kelamin' => 'required|string|max:10',
            'tanggal_mulai_bekerja' => 'required|date',
            'email' => [
                'required',
                'email',
                'regex:/^[\w\.\-]+@([\w\-]+\.)+com$/',
                'unique:karyawans,email',
            ],
            'password' => 'required|string|min:6',
        ]);

        Karyawan::create([
            'nama' => $request->nama_lengkap,
            'alamat_rumah' => $request->alamat_rumah,
            'nomor_telepon' => $request->nomor_telepon,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_mulai_bekerja' => $request->tanggal_mulai_bekerja,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/base/dashboard_admin')->with('success', 'Karyawan berhasil ditambahkan!');
    }

    // Tampilkan semua karyawan
    public function showKaryawan()
    {
        $karyawans = Karyawan::all();
        return view('admin.show_data_karyawan', compact('karyawans'));
    }

    

}
