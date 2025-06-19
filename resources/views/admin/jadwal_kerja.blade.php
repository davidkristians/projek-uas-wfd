@extends('base.dashboard_admin')

@section('jadwal_kerja')
<div class="p-8 text-white">
    <h1 class="mb-4 text-4xl text-center font-bold">Jadwal Kerja</h1>

    <div class="text-center mb-10">
        <a href="{{ route('jadwal.create') }}" class="inline-block bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg">
            + Tambah Jadwal
        </a>
    </div>
  
    <div class="max-w-7xl mx-auto bg-blue-900/30 rounded-lg p-4">
        <div class="grid grid-cols-7 gap-1">
            
            @foreach($days as $day)
                <div class="text-center font-bold text-lg p-3">{{ strtoupper($day) }}</div>
            @endforeach

            @foreach($days as $day)
                <div class="border border-white/20 rounded-md p-2 space-y-2 min-h-[300px]">
                    {{-- KODE FINAL DENGAN SVG YANG DIJAMIN MUNCUL --}}
                    @forelse($jadwals->get($day, []) as $jadwal)
                        <div class="bg-teal-600/50 p-3 rounded-lg text-center relative group">
                            <p class="font-semibold text-lg mt-2">{{ date('H:i', strtotime($jadwal->jam)) }}</p>
                            <p class="text-sm text-gray-300">{{ $jadwal->karyawan->nama }}</p>
                            
                            <div class="absolute top-1 right-1 flex space-x-1">
                                
                                {{-- Tombol Edit dengan SVG yang disederhanakan --}}
                                <a href="{{ route('jadwal.edit', $jadwal) }}" class="p-1 rounded-full" title="Edit">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 20h9"></path>
                                        <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                    </svg>
                                </a>

                                {{-- Tombol Hapus dengan SVG yang disederhanakan --}}
                                <form action="{{ route('jadwal.destroy', $jadwal) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1 rounded-full" title="Hapus">
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M3 6h18"></path>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        @endforelse
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection