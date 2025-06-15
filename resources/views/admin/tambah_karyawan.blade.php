@extends('base.dashboard_admin')

@section('tambah_karyawan')
    <div class="mt-8">
        <h1 class="mb-8 text-4xl text-center fw-bold">Tambah Karyawan</h1>
        <div class="max-w-4xl mx-auto"> <!-- Membatasi lebar dan memusatkan form -->
            <form action="{{ route('simpan_karyawan') }}" method="POST" class="bg-blue-900 bg-opacity-50 p-6 rounded-lg shadow-lg">
                @csrf
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium mb-2">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="w-full p-2 bg-white/40 bg-opacity-20 rounded border-none focus:ring-2 focus:ring-blue-500 text-white placeholder-gray-300" placeholder="Nama Lengkap" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Alamat Rumah</label>
                        <input type="text" name="alamat_rumah" class="w-full p-2 bg-white/40 bg-opacity-20 rounded border-none focus:ring-2 focus:ring-blue-500 text-white placeholder-gray-300" placeholder="Alamat Rumah" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Nomor Telepon</label>
                        <input type="text" name="nomor_telepon" class="w-full p-2 bg-white/40 bg-opacity-20 rounded border-none focus:ring-2 focus:ring-blue-500 text-white placeholder-gray-300" placeholder="Nomor Telepon" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Jenis Kelamin</label>
                        <input type="text" name="jenis_kelamin" class="w-full p-2 bg-white/40 bg-opacity-20 rounded border-none focus:ring-2 focus:ring-blue-500 text-white placeholder-gray-300" placeholder="Jenis Kelamin" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Tanggal Mulai Bekerja</label>
                        <input type="date" name="tanggal_mulai_bekerja" class="w-full p-2 bg-white/40 bg-opacity-20 rounded border-none focus:ring-2 focus:ring-blue-500 text-white" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Email</label>
                        <input type="email" name="email" class="w-full p-2 bg-white/40 bg-opacity-40 rounded border-none focus:ring-2 focus:ring-blue-500 text-white placeholder-gray-300" placeholder="Email" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Password</label>
                        <input type="password" name="password" class="w-full p-2 bg-white/40 bg-opacity-20 rounded border-none focus:ring-2 focus:ring-blue-500 text-white placeholder-gray-300" placeholder="Password" required>
                    </div>
                </div>
                <div class="flex justify-end mt-6 space-x-4">
                    <button type="submit" class="px-4 py-2 bg-teal-500 rounded hover:bg-teal-600">Tambah</button>
                    <a href="{{ route('show_karyawan')}}" class="px-4 py-2 bg-teal-500 rounded hover:bg-teal-600 text-center inline-block">Show Data Karyawan</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
        const btn = document.getElementById("hamburger-btn");
        const sidebar = document.getElementById("sidebar");
        const overlay = document.getElementById("overlay");

        btn.addEventListener("click", () => {
            sidebar.classList.remove("-translate-x-full");
            overlay.classList.remove("hidden");
        });

        overlay.addEventListener("click", () => {
            sidebar.classList.add("-translate-x-full");
            overlay.classList.add("hidden");
        });
    });
    </script>
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const sidebar = document.getElementById('sidebar');

        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            sidebar.classList.toggle('translate-x-0');
        });
    </script>
@endsection