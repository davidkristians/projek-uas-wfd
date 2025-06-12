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

<body class="bg-blue-800 font-sans">

    @include('include.navbar_admin')   
    
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