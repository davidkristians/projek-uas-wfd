<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function registerForm()
    {
        return view('login.register');
    }

    public function register(Request $request)
    {
        // Logika untuk memproses registrasi (validasi, simpan ke database, dll.)
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        // Simpan ke database, misalnya dengan model User
        return redirect('/login')->with('success', 'Registration successful!');
    }
}
