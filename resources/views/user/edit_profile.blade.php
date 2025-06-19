@extends('base.dashboard_user')

@section('profile_user')
<div class="p-8 bg-white rounded-lg shadow-md w-full max-w-2xl mx-auto">
    <h2 class="text-2xl font-semibold mb-6 text-center">Edit Profil</h2>

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700">Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full px-4 py-2 border rounded-md">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Nomor Telepon</label>
            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="w-full px-4 py-2 border rounded-md">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Jenis Kelamin</label>
            <select name="gender" class="w-full px-4 py-2 border rounded-md">
                <option value="Laki-laki" {{ $user->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $user->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                <option value="Waria" {{ $user->gender == 'Waria' ? 'selected' : '' }}>Waria</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">NIK (KTP)</label>
            <input type="text" name="nik" value="{{ old('nik', $user->nik) }}" class="w-full px-4 py-2 border rounded-md">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full px-4 py-2 border rounded-md">
        </div>

        <div class="flex justify-end mt-6">
            <a href="{{ route('profile_user') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md mr-2">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Simpan</button>
        </div>
    </form>
</div>
@endsection
