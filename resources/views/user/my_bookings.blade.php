@extends('base.dashboard_user')

@section('my_bookings')
<main class="mt-24 px-6 lg:px-6 pt-4 bg-gradient-to-br from-[#1B2845] to-[#003049] justify-center">
    <section class="flex-1 bg-gradient-to-tl from-[#000000]/30 to-[#ffffff]/30 backdrop-blur-md p-8 rounded-3xl">  
        <h1 class="text-white text-center mb-14 text-4xl font-bold">My Booking</h1>
        <p class="text-gray-300 mb-3">Your Last Booking</p>
        <div class="flex flex-wrap gap-12">
            @forelse ($bookings as $booking)
                <div class="bg-gradient-to-tl from-[#000000]/50 to-[#ffffff]/20 backdrop-blur-md text-white rounded-lg p-6 w-72 shadow-lg text-center transform hover:scale-105 transition duration-300">
                    <div class="text-5xl mb-4">📅</div>
                    <p class="text-gray-300 mb-2">Tanggal: {{ \Carbon\Carbon::parse($booking->date)->format('d M Y') }}</p>
                    <p class="text-gray-300 mb-2">Waktu: {{ \Carbon\Carbon::parse($booking->time)->format('H:i') }}</p>
                    <p class="text-green-400 font-bold text-xl mb-2">$ {{ number_format($booking->service_price, 0, ',', '.') }}</p>
                    <p class="text-sm text-gray-400 mb-2">Status: {{ $booking->status }}</p>
                    <p class="text-sm text-gray-300">Karyawan: 
                        <span class="font-semibold">
                             {{ $booking->nama_karyawan ?? 'Belum dijadwalkan' }}
                        </span>
                    </p>
                </div>
            @empty
                <p class="text-center text-gray-300">Belum ada booking yang anda lakukan...</p>
            @endforelse
        </div>
        <h2 class="text-white text-center mt-24 mb-6 text-2xl font-semibold">Want To Experience Our Best Service Again??</h2>
        <h3 class="text-white text-center mb-8 text-xm">Please Click the Booking Button Below</h3>
        <div class="flex justify-center">
            <a href="{{ route('dashboard.user') }}" class="bg-cyan-700 text-white px-8 py-2 rounded hover:bg-white hover:!text-black font-semibold text-center">
                BOOK
            </a>
        </div>
    </section>  
</main>
@endsection
