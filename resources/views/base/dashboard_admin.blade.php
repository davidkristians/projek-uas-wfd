<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VroomWash</title>
    <link rel="icon" href="{{ asset('icon_vroom.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>


<body class="bg-gradient-to-r from-[#0f1c2e] via-[#0e2a45] to-[#07192a] font-[Poppins]">

    @include('include.navbar_admin') 
    
    <!-- Notif Success -->
    @if (session('success'))
        <div class="bg-green-500 text-white px-4 py-3 relative mb-4 text-center justify-center">
            {{ session('success') }}
        </div>
    @endif

    @if (Request::is('base/dashboard_admin') || Request::is('/'))
    <div class="min-h-[calc(90vh-4rem)] flex items-center justify-center bg-gradient-to-r from-[#0f1c2e] via-[#0e2a45] to-[#07192a]">
        <h1 class="text-white text-4xl md:text-6xl font-extrabold">
            Selamat datang di Dashboard Admin,<br>Nama_Admin!
        </h1>
    </div>
    @endif

    
    <main class="text-white">
        @yield('tambah_karyawan')
        @yield('jadwal_kerja')
        @yield('layanan')
        @yield('laporan')
        @yield('data')
        @yield('pembayaran')
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const btn = document.getElementById("hamburger-btn"); // Pastikan ada elemen dengan id ini di navbar_admin
            const sidebar = document.getElementById("sidebar");
            const overlay = document.getElementById("overlay");

            btn?.addEventListener("click", () => {
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
        const menuToggle = document.getElementById('menu-toggle'); // Pastikan ada elemen dengan id ini
        const sidebar = document.getElementById('sidebar');

        menuToggle?.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            sidebar.classList.toggle('translate-x-0');
        });
    </script>


</body>
</html>