<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VroomWash</title>
    <link rel="icon" href="{{ asset('icon_vroom.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-[#1B2845] to-[#003049] overflow-x-hidden">
    <!-- Navbar -->
    <nav class="fixed top-0 w-full z-50 mb-1 bg-gray-900 text-white p-4 flex justify-between items-center">
        <div class="flex items-center">
            <img src="{{ asset('vroom_icon_web.jpg') }}" alt="VroomWash Logo" class="mr-3 rounded-full w-12 h-12 object-cover">
            <span class="text-xl font-bold">VroomWash</span>
        </div>
        <div class="flex items-center space-x-8">
            <a href="#home" class="hover:text-gray-300">Home</a>
            <a href="#ourservice" class="hover:text-gray-300">Our Service</a>
            <a href="#contactus" class="hover:text-gray-300">Contact Us</a>
            <!-- <a href="{{ route('login') }}" class="bg-gray-900 border border-white text-white px-8 py-2 rounded hover:bg-white hover:!text-black font-semibold">Login</a> -->
             <p class="font-semibold">Halo User! Selamat datang</p>
            <!-- <img src="{{ asset('profile.png') }}" alt="User" class="inline-block ml-7 rounded-full w-9 h-9 object-cover"> -->
             <div class="relative inline-block text-left" id="profileMenuWrapper">
            <!-- Profile Button -->
            <button onclick="toggleMenu()" class="flex items-center space-x-2 focus:outline-none">
                <img src="{{ asset('profile.png') }}" alt="Profile" class="w-10 h-10 rounded-full border-2 border-white shadow" />
            </button>

            <!-- Dropdown Menu -->
            <div id="dropdownMenu" class="opacity-0 invisible absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg z-50 transition-opacity duration-300 ease-out">
                <a href="/profile" class="flex gap-3 px-4 py-3 hover:bg-gray-200 hover:rounded-xl text-sm text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 1080 1080"><path d="M538.16 32.69c165.36 0 293.98 132.29 293.98 293.98 0 121.27-73.5 224.16-180.06 271.93 191.09 44.1 338.08 198.44 371.15 393.2 7.35 62.47-84.52 77.17-95.54 18.37-29.4-191.09-191.09-334.4-389.52-334.4s-356.45 143.32-389.52 334.4c-7.35 58.8-99.22 44.1-91.87-18.37 33.07-194.76 180.06-349.1 367.48-393.2C321.37 550.83 244.2 447.94 244.2 326.67c0-161.69 132.29-293.98 293.98-293.98Zm0 91.87c-110.24 0-198.44 91.87-198.44 202.11s88.19 198.44 198.44 198.44 202.11-88.19 202.11-198.44-91.87-202.11-202.11-202.11Z" style="fill:#000;stroke-width:0"/></svg> Profile
                </a>
                <a href="/booking-history" class="flex gap-3 px-4 py-3 hover:bg-gray-200 hover:rounded-xl text-sm text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 1080 1080"><defs><style>.cls-1{fill:#000;stroke-width:0}</style></defs><path d="M450.29 739.82c12.37 12.37 28.24 21.32 45.46 23.4 23.6 2.96 46.47-4.98 62.81-21.32l177.8-177.8c14.79-14.79 13.25-39.74-4.51-52.52-13.92-9.95-33.42-7.06-45.59 5.18L508.92 694.1c-1.88 1.88-5.18 1.88-7.06 0l-92.6-92.6c-6.72-6.72-15.47-9.95-24.28-9.95-9.62 0-19.3 3.97-26.16 12.04-11.9 13.92-9.62 35.31 3.43 48.22l88.16 88.16-.13-.14Z" class="cls-1"/><path d="M264.55 23.5c-18.96 0-34.43 15.47-34.43 34.43v118.29l-28.78 4.84c-83.12 14.12-143.37 85.4-143.37 169.6v533.68c0 94.89 77.27 172.16 172.16 172.16h619.76c94.89 0 172.16-77.27 172.16-172.16V350.66c0-84.19-60.25-155.48-143.37-169.6l-28.78-4.84V57.93c0-18.96-15.47-34.43-34.43-34.43s-34.43 15.47-34.43 34.43v120.51H574.45V57.93c0-18.96-15.47-34.43-34.43-34.43s-34.43 15.47-34.43 34.43v120.51H299V57.93c0-18.96-15.47-34.43-34.43-34.43Zm585.33 223.8c56.96 0 103.29 46.33 103.29 103.29v533.68c0 56.96-46.33 103.29-103.29 103.29H230.12c-56.96 0-103.29-46.33-103.29-103.29V350.6c0-56.96 46.33-103.29 103.29-103.29h619.76Z" class="cls-1"/></svg> My Bookings
                </a>
                <a href="/booking-history" class="flex gap-3 px-4 py-3 hover:bg-gray-200 hover:rounded-xl text-sm text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 1080 1080"><defs><style>.cls-1{fill:#000;stroke-width:0}</style></defs><path d="M136.48 707.21 34.22 530.33h204.52L136.48 707.21z" class="cls-1"/><path d="M136.48 729.32 14.88 519.27H258.1L136.49 729.32ZM50.8 541.38l85.68 146.48 85.68-146.48H50.8ZM703.07 687.86c-8.29 0-16.58-2.76-22.11-5.53L548.3 596.65c-11.06-8.29-19.35-22.11-19.35-35.93V334.09c0-22.11 19.35-41.46 41.46-41.46s41.46 19.35 41.46 41.46v204.52l113.32 71.86c19.35 13.82 24.87 38.69 13.82 58.04-8.29 11.06-22.11 19.35-35.93 19.35Z" class="cls-1"/><path d="M578.69 1022.29c-22.11 0-41.46-19.35-41.46-41.46s19.35-41.46 41.46-41.46c221.11 0 400.75-179.65 400.75-397.99S799.79 143.39 578.69 143.39 177.94 323.04 177.94 541.38c0 22.11-19.35 41.46-41.46 41.46s-41.46-19.35-41.46-41.46c0-265.33 218.34-483.67 486.43-483.67s483.67 215.58 483.67 480.9-218.34 483.67-486.43 483.67Z" class="cls-1"/><circle cx="446.03" cy="967.01" r="41.46" class="cls-1"/><path d="M446.03 1011.23c-24.87 0-46.98-19.35-46.98-46.98s19.35-46.98 46.98-46.98 46.98 19.35 46.98 46.98-19.35 46.98-46.98 46.98Zm0-80.15c-19.35 0-35.93 16.58-35.93 35.93s16.58 35.93 35.93 35.93 35.93-16.58 35.93-35.93-13.82-35.93-35.93-35.93Z" class="cls-1"/><circle cx="310.6" cy="903.44" r="41.46" class="cls-1"/><path d="M310.6 947.66c-24.87 0-46.98-19.35-46.98-46.98 0-24.87 19.35-46.98 46.98-46.98s46.98 19.35 46.98 46.98c-2.76 27.64-22.11 46.98-46.98 46.98Zm0-80.15c-19.35 0-35.93 16.58-35.93 35.93s16.58 35.93 35.93 35.93 35.93-16.58 35.93-35.93c0-22.11-16.58-35.93-35.93-35.93Z" class="cls-1"/><circle cx="205.58" cy="798.42" r="41.46" class="cls-1"/><path d="M205.58 842.64c-24.87 0-46.98-19.35-46.98-46.98s19.35-46.98 46.98-46.98 46.98 19.35 46.98 46.98-22.11 46.98-46.98 46.98Zm0-80.15c-19.35 0-35.93 16.58-35.93 35.93s16.58 35.93 35.93 35.93 35.93-16.58 35.93-35.93-16.58-35.93-35.93-35.93Z" class="cls-1"/></svg> Order History
                </a>
                <a href="/logout" class="flex gap-3 px-4 py-3 hover:bg-gray-200 hover:rounded-xl text-sm text-red-600 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 1080 1080" class="fill-red-600"><path d="M104.61 163.43v753.14c0 32.48 26.34 58.82 58.82 58.82h66.37c19.28 0 35.3 16.02 35.3 35.3s-16.02 35.3-35.3 35.3h-66.37C91.9 1045.99 34 988.09 34 916.56V163.43C34 91.9 91.9 34 163.43 34h66.37c19.28 0 35.3 16.02 35.3 35.3s-16.02 35.3-35.3 35.3h-66.37c-32.48 0-58.82 26.34-58.82 58.82Zm811.97 670.75c-19.28 0-35.3 16.02-35.3 35.3v47.09c0 32.48-26.34 58.82-58.82 58.82H445.91c-32.48 0-58.82-26.34-58.82-58.82l-.04-753.14c0-32.48 26.34-58.82 58.82-58.82h376.55c32.48 0 58.82 26.34 58.82 58.82v47.09c0 19.28 16.02 35.3 35.3 35.3s35.3-16.02 35.3-35.3v-47.09C951.84 91.9 893.94 34 822.41 34H445.86c-71.53 0-129.43 57.9-129.43 129.43v753.14c0 71.53 57.9 129.43 129.43 129.43h376.55c71.53 0 129.43-57.9 129.43-129.43v-47.09c0-19.28-16.02-35.3-35.3-35.3h.04Zm105.46-352.59L867.19 326.74c-13.64-13.64-36.23-13.64-49.91 0-13.64 13.64-13.64 36.23 0 49.91L945.3 504.67H559.79c-19.28 0-35.3 16.02-35.3 35.3s16.02 35.3 35.3 35.3H945.3L817.28 703.29c-13.64 13.64-13.64 36.23 0 49.91 7.06 7.06 16.02 10.37 24.93 10.37s17.87-3.31 24.93-10.37l154.85-154.85c31.99-31.99 31.99-84.24 0-116.28l.05-.49Z"/></svg> Log Out
                </a>
            </div>
        </div>
        </div>
    </nav>
    

    <!-- Main -->
    <main class="mt-24 px-6 lg:px-6 pt-4">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Left -->
            <section class="flex-1 bg-gradient-to-tl from-[#000000]/30 to-[#ffffff]/30 backdrop-blur-md p-8 rounded-3xl">
                <h1 class="text-4xl text-white font-bold mb-2">Book Now</h1>
                <p class="text-gray-300 mb-6">Choose Your Car Wash Services</p>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($layanans as $layanan)
                    <div class="rounded-lg p-6 bg-gray-800 text-white flex flex-col justify-between">
                        <div>
                            <div class="text-5xl mb-3">{!! $layanan->icon_svg !!}</div>
                            <p class="text-sm text-gray-400 mb-2 text-center">{{ $layanan->deskripsi }}</p>
                            <h3 class="text-lg font-bold text-center">{{ $layanan->nama }}</h3>
                            <p class="text-green-400 text-center mt-1 text-lg font-semibold">${{ number_format($layanan->harga, 0, ',', '.') }}</p>
                        </div>
                        <button class="mt-2 bg-cyan-700 hover:bg-cyan-600 text-white px-3 py-1 rounded-full text-sm">Select</button>
                    </div>
                    @endforeach
                </div>

                <!-- Form -->
                <div class="mt-8">
                    <label class="block text-sm text-white mb-1">Enter your location</label>
                    <input type="text" placeholder="Your Location (ex, Jalan Siwalankerto Blok DX, No. X. RT X/RW X, Wonocolo, Surabaya)" class="w-full p-2 rounded-lg text-black" />
                </div>
                <div class="mt-4">
                    <label class="block text-sm text-white mb-1">Date & Time</label>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <input type="date" class="w-full sm:w-1/2 p-2 rounded-lg text-black" />
                        <input type="time" class="w-full sm:w-1/2 p-2 rounded-lg text-black" />
                    </div>
                </div>
                <button class="mt-4 bg-cyan-700 hover:bg-cyan-800 px-6 py-2 rounded-full text-white font-semibold">Book Now</button>
            </section>

            <!-- Right Aside -->
            <aside class="w-full lg:w-[22rem] flex flex-col gap-6">
                <div class="bg-gradient-to-tl from-[#000000]/30 to-[#ffffff]/30 backdrop-blur-md p-6 rounded-3xl">
                    <div class="flex justify-between items-center mb-2">
                        <h2 class="text-white font-bold text-xl">Daily Rewards</h2>
                        <span class="text-2xl">👥</span>
                    </div>
                    <p class="text-sm text-gray-300 mb-3">Free Voucher</p>
                    <div class="bg-white text-gray-900 p-4 rounded-xl flex justify-between items-center">
                        <div>
                            <p class="text-lg text-cyan-700 font-bold">$10 Voucher</p>
                            <small class="text-gray-500 text-xs">min. spend $25</small>
                        </div>
                        <button class="bg-cyan-700 hover:bg-sky-500 text-white px-3 py-1 rounded-full text-sm">Claim</button>
                    </div>
                </div>

                <div class="bg-gradient-to-tl from-[#000000]/30 to-[#ffffff]/30 backdrop-blur-md p-6 rounded-3xl">
                    <h2 class="text-xl text-white font-bold mb-2">What’s New?</h2>
                    <img src="{{ asset('dj-khaled.jpg') }}" alt="news" class="rounded-xl mb-2 w-screen h-16 object-[0%_10%] object-cover">
                    <p class="text-sm text-gray-300 leading-tight">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam est dignissimos iusto fugit dolor adipisci illo in ducimus quaerat fugiat rerum quibusdam cumque voluptas vero facilis.
                    </p>
                </div>
            </aside>
        </div>
    </main>

    <script>
        function confirmLogout() {
            if (confirm("Are You Sure Want to Logout?")) {
                document.getElementById('logout-form').submit();
            }
        }
    </script>
</body>
<script>
  function toggleMenu() {
    const menu = document.getElementById("dropdownMenu");
    const isVisible = !menu.classList.contains("invisible");

    if (isVisible) {
      // Fade out
      menu.classList.add("opacity-0");
      setTimeout(() => menu.classList.add("invisible"), 300); // match duration
    } else {
      // Fade in
      menu.classList.remove("invisible");
      setTimeout(() => menu.classList.remove("opacity-0"), 10); // slight delay for transition
    }
  }

  document.addEventListener("click", function (event) {
    const menu = document.getElementById("dropdownMenu");
    const wrapper = document.getElementById("profileMenuWrapper");
    if (!wrapper.contains(event.target)) {
      menu.classList.add("hidden");
    }
  });
</script>

</html>
