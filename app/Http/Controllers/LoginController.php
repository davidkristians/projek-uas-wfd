<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            // Arahkan ke dashboard sesuai role
            switch ($user->role) {
                case 'admin':
                    return redirect('/base/dashboard_admin');
                case 'user':
                    return redirect('/base/dashboard_user');
                case 'karyawan':
                    return redirect('/base/dashboard_karyawan');
                default:
                    return redirect('/home');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Tambahkan pesan sukses logout
    return redirect('/');
}

}
