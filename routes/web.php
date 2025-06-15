<?php

use App\Http\Controllers\JadwalController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\DashboardController;

// Halaman utama
Route::get('/', function () {
    return view('base.baseapp');
});
Route::get('/home', function () {
    return view('base.baseapp');
});

// Login & Logout
Route::get('/login', [LoginController::class, 'loginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Register (hanya user biasa atau bisa disesuaikan)
Route::get('/register', [RegisterController::class, 'registerForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Redirect dashboard sesuai guard yang login
Route::get('/dashboard', function () {
    if (Auth::guard('admin')->check()) {
        return redirect('/base/dashboard_admin');
    } elseif (Auth::guard('karyawan')->check()) {
        return redirect('/base/dashboard_karyawan');
    } elseif (Auth::guard('web')->check()) {
        return redirect('/base/dashboard_user');
    }

    return redirect('/login');
});


// ==================
// ADMIN ROUTES
// ==================
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/base/dashboard_admin', function () {
        return view('base.dashboard_admin');
    });

    Route::get('/data', [DataController::class, 'dataForm'])->name('data');
    Route::get('/jadwal_kerja', [JadwalController::class, 'jadwalForm'])->name('jadwal_kerja');
    
    // LAYANAN
    Route::get('/layanan', [LayananController::class, 'layananForm'])->name('layanan');
    // Tambah layanan
    Route::post('/admin/layanan/tambah', [LayananController::class, 'tambahLayanan'])->name('admin.layanan.store');
    // Update layanan
    Route::post('/admin/layanan/update/{id}', [LayananController::class, 'updateLayanan'])->name('admin.layanan.update');
    // Hapus layanan
    Route::delete('/admin/layanan/delete/{id}', [LayananController::class, 'hapusLayanan'])->name('admin.layanan.destroy');
    // Get layanan by ID (untuk modal edit)
    Route::get('/admin/layanan/{id}', [LayananController::class, 'show'])->name('admin.layanan.show');


    // Tambah Karyawan
    Route::get('/tambahkaryawan', [RegisterController::class, 'registerKaryawan'])->name('tambah_karyawan');
    Route::post('/sukses_tambah_karyawan', [RegisterController::class, 'simpanRegisterKaryawan'])->name('simpan_karyawan');
    Route::get('/showkaryawan', [RegisterController::class, 'showKaryawan'])->name('show_karyawan');
    //    
    Route::get('/pembayaran', [PembayaranController::class, 'pembayaranForm'])->name('pembayaran');
    Route::get('/laporan', [LaporanController::class, 'laporanForm'])->name('laporan');
});

// ==================
// KARYAWAN ROUTES
// ==================
Route::middleware(['auth:karyawan'])->group(function () {
    Route::get('/base/dashboard_karyawan', function () {
        return view('base.dashboard_karyawan');
    });

    Route::get('/jadwal_kerja_karyawan', [JadwalController::class, 'jadwalFormKaryawan'])->name('jadwal_kerja_karyawan');
    Route::get('/riwayat_karyawan', [RiwayatController::class, 'riwayatKaryawan'])->name('riwayat_pekerjaan_karyawan');
    Route::get('/status_pekerjaan', [StatusController::class, 'statusPekerjaan'])->name('status_pekerjaan');
    Route::get('/notifikasi', [NotifikasiController::class, 'notifikasiForm'])->name('notifikasi');
});

// ==================
// USER ROUTES
// ==================
Route::get('/base/dashboard_user', [DashboardController::class, 'dashboardUser'])->name('dashboard.user');

    // Tambahkan route lain khusus user biasa jika ada
// });
