<div class="flex h-screen">
    <!-- Sidebar -->
    <div id="sidebar" class="w-70 bg-blue-900 text-white p-8 space-y-8 transition-all duration-300 ease-in-out transform -translate-x-full md:translate-x-0">
            <div class="text-center">
                <img src="{{asset('karyawan.jpg')}}" alt="Admin" class="rounded-full w-12 h-12 mx-auto">
                <h5 class="mt-2">Karyawan</h5>
            </div>
            <ul class="space-y-5">
                <li>
                    <a href="{{ route('jadwal_kerja_karyawan') }}" class="flex items-center p-2 hover:bg-teal-700 rounded">
                        <!-- Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                        </svg>
                        Jadwal Kerja
                    </a>
                </li>
                <li>
                    <a href="{{ route('riwayat_pekerjaan_karyawan') }}" class="flex items-center p-2 hover:bg-teal-700 rounded">
                        <!-- Icon -->
                        <img src="{{ asset('riwayat.png') }}" alt="Layanan" class="w-6 h-6 mr-5">
                        Riwayat Pekerjaan
                    </a>
                </li>

                <li>
                    <a href="{{ route('status_pekerjaan') }}" class="flex items-center p-2 hover:bg-teal-700 rounded">
                        <!-- Icon -->
                        <img src="{{ asset('status.png') }}" alt="Data" class="w-6 h-6 mr-5">
                        Status Pekerjaan
                    </a>
                </li>
                    <a href="{{ route('notifikasi') }}" class="flex items-center p-2 hover:bg-teal-700 rounded">
                        <!-- Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
                        </svg>
                        Notifikasi
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="confirmLogout()" class="flex items-center p-2 hover:bg-teal-700 rounded">
                        <!-- Icon -->
                        <img src="{{ asset('logout.png') }}" alt="Data" class="w-6 h-6 mr-5">
                        Log Out
                    </a>
                </li>
                
            </ul>
    </div>

</div>

<script>
    function confirmLogout() {
            if (confirm("Are You Sure Want to Logout?")) {
                document.getElementById('logout-form').submit();
            }
        }
</script>


