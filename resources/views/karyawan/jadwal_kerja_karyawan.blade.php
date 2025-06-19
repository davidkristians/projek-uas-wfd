@extends('base.dashboard_karyawan')

@section('jadwal_kerja_karyawan')
<div class="flex-grow flex flex-col mt-1">
    <main class="px-6 lg:px-6 pt-4">
        <section class="flex-1 p-8 rounded-3xl">
            <h1 class="mb-10 text-4xl fw-bold text-center">Jadwal Kerja Anda</h1>
            <p class="text-gray-300 mb-6 text-center">Berikut adalah jadwal kerja mingguan yang telah diatur untuk Anda</p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                {{-- Looping berdasarkan urutan hari yang benar --}}
                @foreach($urutanHari as $hari)
                    {{-- Cek apakah ada jadwal di hari ini --}}
                    @if(isset($jadwalDikelompokkan[$hari]))
                        <div class="bg-gradient-to-tl from-[#000000]/50 to-[#ffffff]/20 backdrop-blur-md text-white rounded-lg p-6 shadow-lg">
                            <h3 class="font-bold text-xl text-cyan-400 mb-4 text-center">{{ $hari }}</h3>
                            <ul class="space-y-2 text-center">
                                {{-- Looping untuk setiap jam di hari tersebut --}}
                                @foreach($jadwalDikelompokkan[$hari] as $jadwal)
                                    <li class="bg-gray-700/50 py-2 px-4 rounded-md">
                                        <span class="font-semibold text-lg">{{ \Carbon\Carbon::parse($jadwal->jam)->format('H:i') }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>
    </main>
</div>
@endsection