@extends('base.dashboard_admin')

@section('data')
    <div class="text-center justify-center items-center flex-grow flex flex-col mt-8">
        <h1 class="mb-10 text-4xl fw-bold">List Data Anggota</h1>
        <h2 class="mb-3 text-xl">Filter & Pilih Data Yang Ingin Anda Tamplikan</h2>
        

        <div class="ext-center justify-center items-center flex-grow flex flex-col mb-10">
            <form action="{{ route('data_form') }}" method="GET" class="flex space-x-4">
                <!-- Dropdown Pilih Data -->
                <select name="filter" required class="p-2 rounded bg-gray-200 text-black font-semibold focus:outline-none">
                    <option value="" disabled {{ $filter == '' ? 'selected' : '' }}>Pilih Data</option>
                    <option value="Karyawan" {{ $filter == 'Karyawan' ? 'selected' : '' }}>Karyawan</option>
                    <option value="Admin" {{ $filter == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="User" {{ $filter == 'User' ? 'selected' : '' }}>Pengguna</option>
                </select>

                <!-- Dropdown Pilih Filter -->
                <select name="order" required class="p-2 rounded bg-gray-200 text-black font-semibold focus:outline-none">
                    <option value="" disabled {{ $order == '' ? 'selected' : '' }}>Pilih Filter</option>
                    <option value="Ascending" {{ $order == 'Ascending' ? 'selected' : '' }}>Ascending</option>
                    <option value="Descending" {{ $order == 'Descending' ? 'selected' : '' }}>Descending</option>
                </select>

                <!-- Tombol Submit -->
                <button type="submit" class="p-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Show Data
                </button>
            </form>
        </div>

    </div>
    @if ($filter == 'User')
        <div class="max-w-5xl mx-auto bg-white rounded shadow p-6">
            <table id="tabel-user" class="w-full text-left border-collapse hidden">
                <thead>
                    <tr class="bg-blue-800 text-white text-center">
                        <th class="p-3">Nama</th>
                        <th class="p-3">Alamat</th>
                        <th class="p-3">Telepon</th>
                        <th class="p-3">Jenis Kelamin</th>
                        <th class="p-3">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $user)
                        <tr class="border-b hover:bg-blue-100 text-center text-black">
                            <td class="p-3">{{ $user->name }}</td>
                            <td class="p-3">{{ $user->alamat }}</td>
                            <td class="p-3">{{ $user->nomor_telepon }}</td>
                            <td class="p-3">{{ $user->jenis_kelamin }}</td>
                            <td class="p-3">{{ $user->email }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="p-4 text-center text-gray-500">Belum ada data user.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @else
        <!-- TABEL UNTUK ADMIN DAN KARYAWAN -->
        <div class="max-w-5xl mx-auto bg-white rounded shadow p-6">
            <table id="tabel-karyawan" class="w-full text-left border-collapse hidden">
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
                    @forelse($data as $item)
                        <tr class="border-b hover:bg-blue-100 text-center text-black">
                            <td class="p-3">{{ $item->nama }}</td>
                            <td class="p-3">{{ $item->alamat_rumah }}</td>
                            <td class="p-3">{{ $item->nomor_telepon }}</td>
                            <td class="p-3">{{ $item->jenis_kelamin }}</td>
                            <td class="p-3">{{ $item->tanggal_mulai_bekerja }}</td>
                            <td class="p-3">{{ $item->email }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-4 text-center text-gray-500">Belum ada data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
         </div>
    @endif

    </div>


    <!-- JS Tabel -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const tabelUser = document.getElementById('tabel-user');
        const tabelKaryawan = document.getElementById('tabel-karyawan');
        const currentFilter = "{{ $filter }}";

        // Cek nilai filter dari controller dan tampilkan tabel yang sesuai
        if (currentFilter === 'User') {
            tabelUser?.classList.remove('hidden');
        } else if (currentFilter === 'Admin' || currentFilter === 'Karyawan') {
            tabelKaryawan?.classList.remove('hidden');
        }
    });
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
        const btn = document.getElementById("hamburger-btn");
        const sidebar = document.getElementById("sidebar");
        const overlay = document.getElementById("overlay");

        btn.addEventListener("click", () => {
            sidebar.classList.remove("-translate-x-full");
            overlay.classList.remove("hidden");
        });

        overlay.addEventListener("click", () => {
            sidebar.classList.add("-translate-x-full");
            overlay.classList.add("hidden");
        });
    });
    </script>
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const sidebar = document.getElementById('sidebar');

        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            sidebar.classList.toggle('translate-x-0');
        });
    </script>
@endsection