@extends('base.dashboard_admin')

@section('laporan')
    <div class="text-center justify-center items-center flex-grow flex flex-col mt-8">
        <h1 class="mb-10 text-4xl fw-bold">Laporan</h1>
        <h2 class="mb-6 text-xl">Filter Untuk Menemukan Pelaporan Yang Diinginkan</h2>
        

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
@endsection