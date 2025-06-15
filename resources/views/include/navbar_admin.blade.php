<nav class="bg-gray-200/15 text-white p-4 flex justify-between items-center">
    <div class="flex items-center space-x-3">
        <!-- Hamburger Button -->
        <button id="hamburger-btn" class="text-white focus:outline-none">
            <!-- Heroicons Hamburger SVG -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>
        <!-- Profile -->
        <img src="{{ asset('atmin.jpg') }}" alt="User Profile" class="w-9 h-9 rounded-full">
        <span class="mr-2">Hi Admin!</span>
    </div>

    <div class="flex items-center">
        <img src="{{ asset('vroom_icon_web.jpg') }}" alt="VroomWash Logo" class="mr-3 rounded-full w-12 h-12 object-cover">
        <span class="font-bold text-xl">VroomWash</span>
    </div>

     <!-- Sidebar Hamburger Menu -->
    <div id="sidebar" class="fixed top-0 left-0 w-70 h-full bg-white shadow-lg transform -translate-x-full transition-transform duration-300 z-50">
        @include('include.hamburger_admin') <!-- path ke hamburger -->
    </div>

    <!-- Overlay -->
    <div id="overlay" class="fixed inset-0 bg-black opacity-50 hidden z-40"></div>
    
</nav>
