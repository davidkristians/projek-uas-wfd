@extends('base.dashboard_user')

@section('profile_user')
<main class="mt-24 p-8 grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Profile Info -->
    <section class="bg-gradient-to-tl from-[#000000]/30 to-[#ffffff]/30 backdrop-blur-md p-12 rounded-2xl col-span-2 shadow-md">
      <div class="flex items-center gap-4 mb-6">
        <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Profile" class="w-30 h-30 rounded-full object-cover border-4 border-white" />
        <h1 class="text-6xl text-white font-bold">Wempy Turki</h1>
      </div>
      <div class="mt-12 space-y-8 text-white">
        <div>
          <p class="text-m text-gray-300">Nama Lengkap</p>
          <div class="flex items-center justify-between">
            <p class="text-xl">Wempy Turki</p>
            <button>✎</button>
          </div>
        </div>
        <div>
          <p class="text-m text-gray-300">Nomor Telepon</p>
          <div class="flex items-center justify-between">
            <p class="text-xl">081234567890</p>
            <button>✎</button>
          </div>
        </div>
        <div>
          <p class="text-m text-gray-300">Jenis Kelamin</p>
          <div class="flex items-center justify-between">
            <p class="text-xl">Waria</p>
            <button>✎</button>
          </div>
        </div>
        <div>
          <p class="text-m text-gray-300">NIK (KTP asli)</p>
          <div class="flex items-center justify-between">
            <p class="text-xl">2020305987250001</p>
            <button>✎</button>
          </div>
        </div>
        <div>
          <p class="text-m text-gray-300">Email</p>
          <div class="flex items-center justify-between">
            <p class="text-xl">Sa_Palu2018@gmail.com</p>
            <button>✎</button>
          </div>
        </div>
      </div>
    </section>

    <!-- History & Bookings -->
    <section class="space-y-6">
        <!-- History -->
<div class="bg-gradient-to-tl from-[#000000]/30 to-[#ffffff]/30 backdrop-blur-md p-8 rounded-2xl shadow-md">
  <h2 class="text-3xl text-white mb-4">History</h2>

  <!-- Tanggal 25 May 2025 -->
  <p class="text-lg text-gray-400 mb-1">25 May 2025</p>

  <!-- Item 1 -->
   <div class="bg-white text-black rounded-xl px-3 py-2 mb-3 flex justify-between items-center">
  <div>
    <p class="text-lg text-cyan-700 font-semibold">Premium Wash</p>
    <p class="text-m text-gray-600">13.00 - 15.00</p>
  </div>
  <p class="text-lg text-black italic text-right">
    On going...
  </p>
</div>

  <!-- Item 2 -->
   <div class="bg-white text-black rounded-xl px-3 py-2 mb-3 flex justify-between items-center">
  <div class="min-w-[20rem]">
    <p class="text-lg text-cyan-700 font-semibold">Inside Wash</p>
    <p class="text-m text-gray-600">13.00 - 15.00</p>
  </div>
  <p class="text-2xl font-bold text-yellow-600 text-right">4.5 <span>⭐</span></p>
</div>

  <!-- Tanggal 22 May 2025 -->
  <p class="text-lg text-gray-400 mb-1 mt-4">22 May 2025</p>

  <!-- Item 3 -->
   <div class="bg-white text-black rounded-xl px-3 py-2 flex justify-between items-center">
  <div>
    <p class="text-lg text-cyan-700 font-semibold">Basic Wash</p>
    <p class="text-m text-gray-600">13.00 - 15.00</p>
  </div>
  <p class="text-lg text-yellow-600 text-right">
    Rate Now!
  </p>
</div>
  <div class="mt-3 text-right">
  <a href="/history" class="text-sm text-blue-400 hover:text-white hover:underline transition duration-200">
    See More...
  </a>
</div>
</div>

<!-- Bookings -->
<div class="bg-gradient-to-tl from-[#000000]/30 to-[#ffffff]/30 backdrop-blur-md p-8 rounded-2xl shadow-md">
  <h2 class="text-3xl text-white mb-4">Bookings</h2>

  <!-- Tanggal -->
  <p class="text-lg text-gray-400 mb-1">29 May 2025</p>

  <div class="bg-white text-black rounded-xl px-3 py-2 flex justify-between items-center">
    <div>
      <p class="text-lg text-cyan-700 font-semibold">Premium Wash</p>
      <p class="text-m text-gray-600">13.00 - 15.00</p>
    </div>
    <span class="text-lg font-medium text-blue-600 cursor-pointer">Chat Now</span>
  </div>
<div class="mt-3 text-right">
  <a href="/bookings" class="text-sm text-blue-400 hover:text-white hover:underline transition duration-200">
    See More...
  </a>
</div>
</div>

    </section>
  </main>
@endsection