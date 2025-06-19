@extends('base.dashboard_admin')

@section('data') {{-- Anda bisa menggunakan section lain jika perlu --}}

<div class="p-8">
    <h1 class="text-3xl font-bold mb-8 text-center text-white">Manajemen Booking</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-6 max-w-4xl mx-auto text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="max-w-6xl mx-auto bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Booking Belum Ditugaskan</h2>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-blue-800 text-white text-center">
                        <th class="p-3">Customer</th>
                        <th class="p-3">Layanan</th>
                        <th class="p-3">Tanggal & Waktu</th>
                        <th class="p-3">Lokasi</th>
                        <th class="p-3" style="width: 250px;">Tugaskan Karyawan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                        <tr class="border-b hover:bg-gray-100 text-center text-black">
                            <td class="p-3">{{ $booking->user_name }}</td>
                            <td class="p-3">{{ $booking->service_name }}</td>
                            <td class="p-3">{{ \Carbon\Carbon::parse($booking->date)->format('d M Y') }} - {{ \Carbon\Carbon::parse($booking->time)->format('H:i') }}</td>
                            <td class="p-3">{{ $booking->location }}</td>
                            <td class="p-3">
                                <form action="{{ route('admin.bookings.assign', $booking->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="flex items-center justify-center">
                                        <select name="karyawan_id" class="p-2 border rounded-md" required>
                                            <option value="">-- Pilih Karyawan --</option>
                                            @foreach($karyawans as $karyawan)
                                                <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="ml-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                            Simpan
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-4 text-center text-gray-500">Tidak ada booking yang perlu ditugaskan saat ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection