@extends('base.dashboard_user')

@section('history')
<main class="mt-24 px-6 lg:px-6 pt-4 bg-gradient-to-br from-[#1B2845] to-[#003049] justify-center">
    <section class="flex-1 bg-gradient-to-tl from-[#000000]/30 to-[#ffffff]/30 backdrop-blur-md p-8 rounded-3xl"> 
        <h1 class="text-white text-center mb-14 text-4xl font-bold">History</h1>

        {{-- 25 May 2025 --}}
        <div class="mb-8">
            <h2 class="text-lg font-medium mb-2 text-gray-300">25 May 2025</h2>
            @for ($i = 0; $i < 2; $i++)
            <div class="flex justify-between items-center bg-white text-black px-4 py-3 mb-3 rounded-3xl shadow-md">
                <div>
                    <h3 class="text-xl font-bold text-cyan-700">Inside Wash</h3>
                    <p class="text-m text-gray-600">13.00 - 15.00</p>
                </div>
                <p class="text-2xl font-bold text-black text-right">4.5 <span>⭐</span></p>
            </div>
            @endfor
        </div>

        {{-- 22 May 2025 --}}
        <div class="mb-8">
            <h2 class="text-lg font-medium mb-2 text-gray-300">22 May 2025</h2>
            @for ($i = 0; $i < 2; $i++)
            <div class="flex justify-between items-center bg-white text-black px-4 py-3 mb-3 rounded-3xl shadow-md">
                <div>
                    <h3 class="text-xl font-bold text-cyan-700">Inside Wash</h3>
                    <p class="text-m text-gray-600">13.00 - 15.00</p>
                </div>
                <p class="text-2xl font-bold text-black text-right">4.5 <span>⭐</span></p>
            </div>
            @endfor
        </div>

        {{-- 21 May 2025 --}}
        <div class="mb-8">
            <h2 class="text-lg font-medium mb-2 text-gray-300">21 May 2025</h2>
            <div class="flex justify-between items-center bg-white text-black px-4 py-3 mb-3 rounded-3xl shadow-md">
                <div>
                    <h3 class="text-xl font-bold text-cyan-700">Inside Wash</h3>
                    <p class="text-m text-gray-600">13.00 - 15.00</p>
                </div>
                <p class="text-2xl font-bold text-black text-right">4.5 <span>⭐</span></p>
            </div>
        </div>
    </section>
</main>
@endsection
