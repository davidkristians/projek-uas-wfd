@extends('base.dashboard_karyawan')

@section('status_pekerjaan')
<div class="flex-grow flex flex-col mt-1">
    <main class="px-6 lg:px-6 pt-4">
        <section class="flex-1 p-8 rounded-3xl">
            <h1 class="mb-10 text-4xl fw-bold text-center">Status Pekerjaan</h1>
            <p class="text-gray-300 mb-6 text-center">Daftar pekerjaan aktif yang ditugaskan kepada Anda</p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                {{-- Ganti blok @forelse yang lama dengan yang ini --}}

@forelse ($pekerjaan as $job)
<div class="bg-gradient-to-tl from-[#000000]/50 to-[#ffffff]/20 backdrop-blur-md text-white rounded-lg p-6 shadow-lg flex flex-col justify-between">
    {{-- Bagian Info (tetap sama) --}}
    <div>
        <div class="text-5xl mb-4 text-center">🚗</div>
        <h3 class="font-bold text-xl text-cyan-400 mb-2 text-center">{{ $job->service_name }}</h3>
        <p class="text-gray-300 text-sm"><strong>Customer:</strong> {{ $job->user_name }}</p>
        <p class="text-gray-300 text-sm"><strong>Lokasi:</strong> {{ $job->location }}</p>
        <p class="text-gray-300 text-sm"><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($job->date)->format('d M Y') }} - {{ \Carbon\Carbon::parse($job->time)->format('H:i') }}</p>
    </div>

    {{-- Bagian Aksi / Tombol (BARU) --}}
    <div class="mt-6 text-center">
        @if($job->status == 'unprocessed')
            <form action="{{ route('karyawan.booking.updateStatus', $job->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <input type="hidden" name="status" value="on-going">
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                    Kerjakan Sekarang (On-going)
                </button>
            </form>

        @elseif($job->status == 'on-going')
            <form action="{{ route('karyawan.booking.updateStatus', $job->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <input type="hidden" name="status" value="done">
                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg">
                    Selesaikan Pekerjaan (Done)
                </button>
            </form>
        @endif
    </div>
</div>
@empty
<div class="col-span-full text-center py-10">
    <p class="text-gray-400 text-xl">Tidak ada pekerjaan yang ditugaskan kepada Anda saat ini.</p>
</div>
@endforelse
            </div>
        </section>
    </main>
</div>
@endsection