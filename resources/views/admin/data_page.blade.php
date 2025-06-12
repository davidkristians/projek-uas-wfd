@extends('base.dashboard_admin')

@section('data')
    <div class="text-center justify-center items-center flex-grow flex flex-col mt-8">
        <h1 class="mb-10 text-4xl fw-bold">Data Management</h1>
        <h2 class="mb-6 text-xl">Filter & Pilih Data Yang Ingin Anda Tamplikan</h2>
        <div class="flex space-x-4">
            <select class="p-2 rounded bg-gray-200 text-black font-semibold focus:outline-none" id="dataType">
                <option value="" disabled selected>Pilih Data</option>
                <option value="karyawan">Karyawan</option>
                <option value="admin">Admin</option>
                <option value="pengguna">Pengguna</option>
            </select>
            <select class="p-2 rounded bg-gray-200 text-black font-semibold focus:outline-none" id="sortOrder">
                <option value="" disabled selected>Pilih Filter</option>
                <option value="ascending">Ascending</option>
                <option value="descending">Descending</option>
            </select>
            <button class="p-2 bg-blue-500 rounded hover:bg-blue-300" onclick="showData()">Show Data</button>
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