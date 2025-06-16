@extends('base.dashboard_admin')

@section('jadwal_kerja')
<div class="p-8 text-white">
    <h1 class="mb-10 text-4xl text-center font-bold">
        {{ $jadwal->exists ? 'Edit Jadwal' : 'Tambah Jadwal Baru' }}
    </h1>

    <div class="max-w-2xl mx-auto bg-blue-900/30 rounded-lg p-8">
        <form action="{{ $action }}" method="POST">
            @csrf
            @method($method)

            <div class="mb-4">
                <label for="karyawan_id" class="block mb-2 text-sm font-medium text-gray-300">Karyawan</label>
                <select name="karyawan_id" id="karyawan_id" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    <option value="">-- Pilih Karyawan --</option>
                    @foreach($karyawans as $karyawan)
                        <option value="{{ $karyawan->id }}" {{ $jadwal->karyawan_id == $karyawan->id ? 'selected' : '' }}>
                            {{ $karyawan->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="hari" class="block mb-2 text-sm font-medium text-gray-300">Hari</label>
                <select name="hari" id="hari" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                     <option value="">-- Pilih Hari --</option>
                    @foreach($days as $day)
                         <option value="{{ $day }}" {{ $jadwal->hari == $day ? 'selected' : '' }}>
                            {{ $day }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label for="jam" class="block mb-2 text-sm font-medium text-gray-300">Jam</label>
                <input type="time" name="jam" id="jam" value="{{ old('jam', $jadwal->jam) }}" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Simpan Jadwal
                </button>
                <a href="{{ route('jadwal_kerja') }}" class="text-gray-400 hover:text-white">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection