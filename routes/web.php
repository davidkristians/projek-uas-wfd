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
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RiwayatBookingUserController;
use App\Http\Controllers\Admin\BookingManagementController;


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

    Route::get('/data', [DataController::class, 'dataForm'])->name('data_form');
    Route::get('/showdata', [DataController::class, 'index'])->name('all_data');


    Route::get('/jadwal_kerja', [JadwalController::class, 'jadwalForm'])->name('jadwal_kerja');
    
    // RUTE BARU UNTUK CRUD JADWAL
    Route::get('/jadwal/create', [JadwalController::class, 'create'])->name('jadwal.create'); // Menampilkan form tambah
    Route::post('/jadwal', [JadwalController::class, 'store'])->name('jadwal.store'); // Menyimpan data baru
    Route::get('/jadwal/{jadwal}/edit', [JadwalController::class, 'edit'])->name('jadwal.edit'); // Menampilkan form edit
    Route::put('/jadwal/{jadwal}', [JadwalController::class, 'update'])->name('jadwal.update'); // Menyimpan perubahan
    Route::delete('/jadwal/{jadwal}', [JadwalController::class, 'destroy'])->name('jadwal.destroy'); // Menghapus jadwal
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

    Route::get('/admin/bookings', [BookingManagementController::class, 'index'])->name('admin.bookings.index');
    Route::put('/admin/bookings/{booking}/assign', [BookingManagementController::class, 'assign'])->name('admin.bookings.assign');

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
    Route::patch('/karyawan/bookings/{booking}/update-status', [StatusController::class, 'updateStatus'])->name('karyawan.booking.updateStatus');
});

//API UNTUK CEK SLOT JADWAL TERSEDIA
Route::get('/api/available-slots', [BookingController::class, 'getAvailableSlots'])->name('api.available_slots');

// ==================
// USER ROUTES
// ==================
Route::middleware('auth:web')->group(function () {
    Route::get('/historybookings', [RiwayatBookingUserController::class, 'historyBooking'])->name('user.history');
    Route::get('/historybookings', [RiwayatBookingUserController::class, 'history'])->name('user.history');
    // USER RATING
    Route::post('/bookings/{id}/rate', [RiwayatBookingUserController::class, 'rateBooking'])->name('bookings.rate');

    Route::get('/mybooking', [BookingController::class, 'userBooking'])->name('user.booking');
    Route::get('/base/dashboard_user', [DashboardController::class, 'dashboardUser'])->name('dashboard.user');
    
    // HALAMAN PROFILE
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile_user')->middleware('auth');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');
    Route::post('/bookings/{id}/rate', [RiwayatBookingUserController::class, 'rateBooking'])->name('bookings.rate');
    Route::get('/profile', [RiwayatBookingUserController::class, 'showProfile'])->name('profile_user');

    // BUAT BOOKING
    Route::post('/book', [BookingController::class, 'store'])->name('book.store');
    Route::get('/user/success', function () {
    return view('user.success');
    });

    // Untuk Edit User
    // KALAU MAU PAKE MODAL FORM
    // Route::get('/profile_user', [ProfileController::class, 'index'])->name('profile_user');

    Route::get('/profile_user/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile_user/update', [ProfileController::class, 'update'])->name('profile.update');

    
});

