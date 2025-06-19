@extends('base.dashboard_user')

@section('profile_user')
<main class="mt-24 p-8 grid grid-cols-1 lg:grid-cols-3 gap-6">
  <!-- MODAL FORM UNTUK EDIT PROFIL -->
<div id="editProfileModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center">
  <div class="bg-white p-6 rounded-xl w-full max-w-xl shadow-lg">
    <h2 class="text-2xl font-bold mb-4">Edit Profil</h2>
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="block">Nama Lengkap</label>
            <input type="text" name="name" value="{{ $user->name }}" class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-3">
            <label class="block">Nomor Telepon</label>
            <input type="text" name="nomor_telepon" value="{{ $user->nomor_telepon }}" class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-3">
            <label class="block">Alamat</label>
            <input type="text" name="alamat" value="{{ $user->alamat }}" class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-3">
            <label class="block">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="w-full border rounded px-3 py-2" disabled>
                <option value="Laki-laki" {{ $user->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $user->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                <option value="Waria" {{ $user->jenis_kelamin == 'Waria' ? 'selected' : '' }}>Waria</option>
            </select>
            <input type="hidden" name="jenis_kelamin" value="{{ $user->jenis_kelamin }}">
        </div>
        <div class="mb-3">
            <label class="block">Email</label>
            <input type="email" name="email" value="{{ $user->email }}" class="w-full border rounded px-3 py-2" disabled>
            <input type="hidden" name="email" value="{{ $user->email }}">
        </div>

        <div class="flex justify-end gap-2 mt-4">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>
            <button type="button" onclick="toggleModal(false)" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Tutup</button>
        </div>
    </form>
  </div>
</div>
    <!-- Profile Info -->
    <section class="bg-gradient-to-tl from-[#000000]/30 to-[#ffffff]/30 backdrop-blur-md p-12 rounded-2xl col-span-2 shadow-md">
      <div class="flex items-center justify-between gap-4 mb-6">
        <div class="flex items-center gap-4">
          <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Profile" class="w-30 h-30 rounded-full object-cover border-4 border-white" />
          <h1 class="text-6xl text-white font-bold">{{ $user->name }}</h1>
        </div>
        
          <button onclick="toggleModal(true)" class="bg-[#1B2845] text-white px-4 py-2 rounded-3xl hover:bg-[#5f7094] transition duration-200">
            Edit Profil
          </button>
      </div>
      <div class="mt-12 space-y-8 text-white">
        <div>
          <p class="text-m text-gray-300">Nama Lengkap</p>
          <div class="flex items-center justify-between">
            <p class="text-xl">{{ $user->name }}</p>
          </div>
        </div>
        <div>
          <p class="text-m text-gray-300">Nomor Telepon</p>
          <div class="flex items-center justify-between">
            <p class="text-xl">{{ $user->nomor_telepon }}</p>
          </div>
        </div>
        <div>
          <p class="text-m text-gray-300">Jenis Kelamin</p>
          <div class="flex items-center justify-between">
            <p class="text-xl">{{ $user->jenis_kelamin }}</p>
          </div>
        </div>
        <div>
          <p class="text-m text-gray-300">Alamat Rumah</p>
          <div class="flex items-center justify-between">
            <p class="text-xl">{{ $user->alamat }}</p>
          </div>
        </div>
        <div>
          <p class="text-m text-gray-300">Email</p>
          <div class="flex items-center justify-between">
            <p class="text-xl">{{ $user->email }}</p>
          </div>
        </div>
      </div>
    </section>

    <!-- HISTORY BOOKING USER PROFILE -->
<section class="space-y-6">
  <div class="bg-gradient-to-tl from-[#000000]/30 to-[#ffffff]/30 backdrop-blur-md p-8 rounded-2xl shadow-md">
    <h2 class="text-3xl text-white mb-4">History</h2>

    @forelse ($history as $date => $bookings)
        <div class="mb-8">
            <p class="text-lg font-medium mb-1 text-gray-300">{{ $date }}</p>
            @foreach ($bookings as $booking)
                <div class="flex justify-between items-center bg-white text-black px-4 py-3 mb-2 rounded-3xl shadow-md">
                    <div>
                        <p class="text-xl font-bold text-cyan-700">{{ $booking->service_name }}</p>
                        <p class="text-sm text-gray-600">{{ \Carbon\Carbon::parse($booking->time)->format('H:i') }}</p>
                    </div>
                    @if ($booking->rating)
                        <p class="text-2xl font-bold text-black text-right">{{ $booking->rating }} <span>⭐</span></p>
                    @else
                        <form action="{{ route('bookings.rate', $booking->id) }}" method="POST" class="flex items-center space-x-2">
                            @csrf
                            <select name="rating" class="border rounded p-1 text-sm">
                                <option disabled selected>Rate</option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            <button type="submit" class="text-sm bg-blue-500 text-white px-2 py-1 rounded">Submit</button>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>
    @empty
    <p class="text-gray-300 text-center">Anda belum pernah melakukan booking.</p>
  @endforelse
    @if ($history->count())
        <div class="text-right mt-2">
            <a href="{{ route('user.history') }}" class="text-sm text-blue-300 hover:text-white hover:underline">See More...</a>
        </div>
    @endif
    </div>


<!-- Bookings -->
{{-- <div class="bg-gradient-to-tl from-[#000000]/30 to-[#ffffff]/30 backdrop-blur-md p-8 rounded-2xl shadow-md mt-12">
    <h2 class="text-3xl text-white mb-6 text-center font-bold">Upcoming Bookings</h2>
    <div class="flex flex-wrap gap-6 justify-center">
        @forelse ($bookings as $booking)
            <div class="bg-gradient-to-tl from-[#000000]/50 to-[#ffffff]/20 backdrop-blur-md text-white rounded-lg p-6 w-72 shadow-lg text-center transform hover:scale-105 transition duration-300">
                <div class="text-5xl mb-4">📅</div>
                <p class="text-gray-300 mb-2">Tanggal: {{ \Carbon\Carbon::parse($booking->date)->format('d M Y') }}</p>
                <p class="text-gray-300 mb-2">Waktu: {{ \Carbon\Carbon::parse($booking->time)->format('H:i') }}</p>
                <p class="text-green-400 font-bold text-xl mb-2">Rp {{ number_format($booking->service_price, 0, ',', '.') }}</p>
                <p class="text-sm text-gray-400 mb-2">Status: {{ $booking->status }}</p>
                <p class="text-sm text-gray-300">Karyawan: 
                    <span class="font-semibold">
                        {{ $booking->nama_karyawan ?? 'Belum dijadwalkan' }}
                    </span>
                </p>
            </div>
        @empty
            <p class="text-center text-gray-300">Belum ada booking yang akan datang...</p>
        @endforelse
    </div>
</div> --}}

<div class="bg-gradient-to-tl from-[#000000]/30 to-[#ffffff]/30 backdrop-blur-md p-8 rounded-2xl shadow-md mt-12">
    <h2 class="text-3xl text-white mb-4">Bookings</h2>
    @forelse ($bookings as $booking)
        <p class="text-lg text-gray-400 mb-1">
            {{ \Carbon\Carbon::parse($booking->date)->format('d M Y') }}
        </p>
        <div class="bg-white text-black rounded-3xl px-4 py-3 flex justify-between items-center mb-3 ">
            <div>
                <p class="text-xl font-bold text-cyan-700">{{ $booking->service_name }}</p>
                <p class="text-sm text-gray-600">
                    {{ \Carbon\Carbon::parse($booking->time)->format('H:i') }} 
                </p>
            </div>
            <span class="text-lg font-medium text-blue-600 capitalize">{{ $booking->status }}</span>
        </div>
    @empty
        <p class="text-gray-300 text-center">Belum ada booking yang akan datang.</p>
    @endforelse

    @if ($bookings->count())
        <div class="text-right mt-2">
            <a href="{{ route('user.booking') }}" class="text-sm text-blue-300 hover:text-white hover:underline">See More...</a>
        </div>
    @endif
</div>


    </section>
  </main>

  <script>
    function toggleModal(show) {
      const modal = document.getElementById('editProfileModal');
        if (show) {
          modal.classList.remove('hidden');
          modal.classList.add('flex');
        } 
        else {
          modal.classList.add('hidden');
          modal.classList.remove('flex');
        }
    }
</script>
@endsection