@extends('base.dashboard_karyawan')

@section('riwayat_pekerjaan')
<div class="flex-grow flex flex-col mt-1">
    <main class="px-6 lg:px-6 pt-4">
        <section class="flex-1 p-8 rounded-3xl">
            <h1 class="mb-10 text-4xl fw-bold text-center">Riwayat Pekerjaan</h1>
            <p class="text-gray-300 mb-6 text-center">Daftar pekerjaan yang telah Anda selesaikan</p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($pekerjaanSelesai as $job)
                <div class="bg-gradient-to-tl from-[#000000]/50 to-[#ffffff]/20 backdrop-blur-md text-white rounded-lg p-6 shadow-lg text-center">
                    <div class="text-5xl mb-4">✅</div>
                    <h3 class="font-bold text-xl text-cyan-400 mb-2">{{ $job->service_name }}</h3>
                    <p class="text-gray-300 text-sm"><strong>Customer:</strong> {{ $job->user_name }}</p>
                    <p class="text-gray-300 text-sm"><strong>Lokasi:</strong> {{ $job->location }}</p>
                    <p class="text-gray-300 text-sm"><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($job->date)->format('d M Y') }} - {{ \Carbon\Carbon::parse($job->time)->format('H:i') }}</p>

                    <div class="mt-4">
                        <span class="px-3 py-1 text-sm font-semibold rounded-full bg-gray-500 text-white">
                            Selesai
                        </span>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-10">
                    <p class="text-gray-400 text-xl">Anda belum memiliki riwayat pekerjaan.</p>
                </div>
                @endforelse
            </div>
        </section>
    </main>
</div>
@endsection