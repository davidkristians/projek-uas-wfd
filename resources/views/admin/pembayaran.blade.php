@extends('base.dashboard_admin')

@section('pembayaran')
<div class="text-center justify-center items-center flex-grow flex flex-col mt-8">
    <h1 class="mb-10 text-4xl fw-bold">Pembayaran</h1>

    <div class="space-y-4 w-full px-4 md:px-10">
        @forelse ($bookings as $b)
            <div class="bg-gradient-to-tl from-[#000000]/30 to-[#ffffff]/50 backdrop-blur-md rounded-lg p-4 flex justify-between items-start w-full">
                <!-- Kiri -->
                <div class="flex flex-col">
                    <div class="flex space-x-4 text-gray-900 text-sm mb-1">
                        <span>{{ \Carbon\Carbon::parse($b->date)->format('d M Y') }}</span>
                        <span>Waktu: {{ \Carbon\Carbon::parse($b->time)->format('H:i') }}</span>
                    </div>
                    <div class="text-sm text-white mb-1">
                        <span class="font-semibold">Customer:</span> {{ $b->user->name ?? '-' }}
                    </div>
                    <div class="text-sm text-white">
                        <span class="font-semibold">Layanan:</span> {{ $b->layanan->nama ?? '-' }}
                    </div>
                </div>

                <!-- Kanan -->
                <div class="text-right">
                    <div class="text-xl font-bold text-cyan-400 mb-1">${{ number_format($b->service_price, 0, ',', '.') }}</div>
                    <div class="text-sm text-white">
                        <span class="font-semibold">Metode:</span> {{ ucfirst($b->payment_method) }}
                    </div>
                </div>
            </div>
        @empty
            <p class="text-gray-600">Belum ada pembayaran masuk.</p>
        @endforelse
    </div>
</div>

<!-- Script Sidebar -->
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

    const menuToggle = document.getElementById('menu-toggle');
    const sidebar = document.getElementById('sidebar');

    menuToggle?.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
        sidebar.classList.toggle('translate-x-0');
    });
</script>
@endsection
