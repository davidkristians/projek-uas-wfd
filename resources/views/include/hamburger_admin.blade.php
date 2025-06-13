<div class="flex h-screen">
    <!-- Sidebar -->
    <div id="sidebar" class="w-70 bg-blue-900 text-white p-8 space-y-8 transition-all duration-300 ease-in-out transform -translate-x-full md:translate-x-0">
            <div class="text-center">
                <img src="{{asset('atmin.jpg')}}" alt="Admin" class="rounded-full w-12 h-12 mx-auto">
                <h5 class="mt-2">Admin</h5>
            </div>
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('tambah_karyawan') }}" class="flex items-center px-3 py-2 hover:bg-teal-700 rounded-full">
                        <!-- Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Tambah Karyawan
                    </a>
                </li>
                <li>
                    <a href="{{ route('jadwal_kerja') }}" class="flex items-center px-3 py-2 hover:bg-teal-700 rounded-full">
                        <!-- Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                        </svg>
                        Jadwal Kerja
                    </a>
                </li>
                <li>
                    <a href="{{ route('layanan') }}" class="flex items-center px-3 py-2 hover:bg-teal-700 rounded-full">
                        <!-- Icon -->
                        <img src="{{ asset('customer-service.png') }}" alt="Layanan" class="w-6 h-6 mr-5">
                        Layanan
                    </a>
                </li>

                <li>
                    <a href="{{ route('laporan') }}" class="flex items-center px-3 py-2 hover:bg-teal-700 rounded-full">
                        <!-- Icon -->
                        <img src="{{ asset('report.png') }}" alt="Data" class="w-6 h-6 mr-5">
                        Laporan
                    </a>
                </li>
                <li>
                    <a href="{{ route('data') }}" class="flex items-center px-3 py-2 hover:bg-teal-700 rounded-full">
                        <!-- Icon -->
                        <img src="{{ asset('data.png') }}" alt="Data" class="w-6 h-6 mr-5">
                        Data
                    </a>
                </li>
                <li>
                    <a href="{{ route('pembayaran') }}" class="flex items-center px-3 py-2 hover:bg-teal-700 rounded-full">
                        <!-- Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Pembayaran
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="confirmLogout()" class="flex items-center px-3 py-2 hover:bg-teal-700 rounded-full">
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


