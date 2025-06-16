@extends('base.dashboard_karyawan')

@section('status_pekerjaan')
<div class="flex-grow flex flex-col mt-1">
        <main class="px-6 lg:px-6 pt-4">
            <section class="flex-1 p-8 rounded-3xl">  
                <h1 class="mb-10 text-4xl fw-bold text-center">Status Pekerjaan</h1>
                <p class="text-gray-300 mb-3">Your List Working</p>
                <div class="flex flex-wrap gap-12">
                    
                </div>
                
            </section>  
        </main>
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