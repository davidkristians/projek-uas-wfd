<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VroomWash</title>
    <link rel="icon" href="{{ asset('icon_vroom.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
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
            <p class="font-semibold">Halo User! Selamat datang</p>
            <img src="{{ asset('profile.png') }}" alt="User" class="inline-block ml-4 rounded-full w-9 h-9 object-cover">
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
</html>
