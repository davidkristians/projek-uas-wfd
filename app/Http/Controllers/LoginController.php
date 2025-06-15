<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

            // Cek di admin
        if (Auth::guard('admin')->attempt($credentials)) {
        $request->session()->regenerate();
        return redirect('/base/dashboard_admin');
        }

        elseif (Auth::guard('karyawan')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/base/dashboard_karyawan');
        }

        elseif (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
             return redirect()->route('dashboard.user');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);

    }

    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } elseif (Auth::guard('karyawan')->check()) {
            Auth::guard('karyawan')->logout();
        } else {
            Auth::logout(); // default web
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}
