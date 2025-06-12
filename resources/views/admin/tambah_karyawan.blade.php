<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VroomWash</title>
    <link rel="icon" href="{{ asset('icon_vroom.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body class="bg-blue-900 text-white">

   @include('include.navbar_admin')
    <div class="mt-8">
        <h1 class="mb-8 text-4xl text-center fw-bold">Tambah Karyawan</h1>
        <div class="max-w-4xl mx-auto"> <!-- Membatasi lebar dan memusatkan form -->
            <form action="#" method="POST" class="bg-blue-800/20 bg-opacity-50 p-6 rounded-lg shadow-lg">
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
                    <a href="#" class="px-4 py-2 bg-teal-500 rounded hover:bg-teal-600 text-center inline-block">Show Data Karyawan</a>
                </div>
            </form>
        </div>
    </div>
</body>

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
</html>