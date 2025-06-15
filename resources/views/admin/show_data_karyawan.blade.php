@extends('base.dashboard_admin')

@section('tambah_karyawan')
<div class="mt-8">
    <h1 class="mb-6 text-4xl text-center font-bold">Daftar Karyawan</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-4 rounded mb-4 max-w-4xl mx-auto text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex max-w-5xl mx-auto mb-3 mt-12">
        <a href="{{ route('tambah_karyawan') }}" class="flex items-center p-2 bg-red-600 hover:bg-red-700 rounded mr-4">
            <!-- Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
            </svg>
            Back
        </a>
        <a href="{{ route('tambah_karyawan') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Tambah Karyawan Baru</a>
    </div>

    <div class="max-w-5xl mx-auto bg-white rounded shadow p-6">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-blue-800 text-white text-center">
                    <th class="p-3">Nama</th>
                    <th class="p-3">Alamat</th>
                    <th class="p-3">Telepon</th>
                    <th class="p-3">Jenis Kelamin</th>
                    <th class="p-3">Mulai Bekerja</th>
                    <th class="p-3">Email</th>
                </tr>
            </thead>
            <tbody>
                @forelse($karyawans as $karyawan)
                    <tr class="border-b hover:bg-blue-100 text-center text-black">
                        <td class="p-3">{{ $karyawan->nama }}</td>
                        <td class="p-3">{{ $karyawan->alamat_rumah }}</td>
                        <td class="p-3">{{ $karyawan->nomor_telepon }}</td>
                        <td class="p-3">{{ $karyawan->jenis_kelamin }}</td>
                        <td class="p-3">{{ $karyawan->tanggal_mulai_bekerja }}</td>
                        <td class="p-3">{{ $karyawan->email }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-4 text-center text-gray-500">Belum ada data karyawan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
