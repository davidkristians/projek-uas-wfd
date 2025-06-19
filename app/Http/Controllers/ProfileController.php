<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user();
        return view('user.profile_user', compact('user'));
    }

    // KALO MAU PAKE MODAL FORM KATANYA PAKE INI
    // public function index()
    // {
    //     $user = Auth::user(); // ambil user login
    //     return view('user.profile_user', compact('user')); // kirim user ke blade
    // }

    public function edit()
    {
        $user = Auth::user();
        return view('user.edit_profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'jenis_kelamin' => 'required|string',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user->update([
            'name' => $request->name,
            'nomor_telepon' => $request->nomor_telepon,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'email' => $request->email,
        ]);

        return redirect()->route('profile_user')->with('success', 'Profil berhasil diperbarui!');
    }

}
