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
</head>
<style>
    body,html {
        font-family: 'Poppins', sans-serif;
    }
</style>

<body class="bg-gray-800">
    <!-- Navbar -->
    <nav class="fixed top-0 w-full z-50 bg-gray-900 text-white p-4 flex justify-between items-center">
        <!-- Icon dan Brand -->
        <div class="flex items-center">
            <img src="{{ asset('vroom_icon_web.jpg') }}" alt="VroomWash Logo" class="mr-3 rounded-full w-12 h-12 object-cover">
            <span class="text-xl font-bold">VroomWash</span>
        </div>

        <!-- Menu Lain -->
        <div class="flex items-center space-x-8">
            <a href="#home" class="hover:text-gray-300">Home</a>
            <a href="#ourservice" class="hover:text-gray-300">Our Service</a>
            <a href="#contactus" class="hover:text-gray-300">Contact Us</a>
            <a href="{{ route('login') }}" class="bg-gray-900 border border-white text-white px-8 py-2 rounded hover:bg-white hover:!text-black font-semibold">Login</a>
            <img src="{{ asset('profile.png') }}" alt="User" class="inline-block ml-7 rounded-full w-9 h-9 object-cover">
        </div>
    </nav>

    <!-- Header & Isinya-->
    <header class="pt-36 relative bg-cover bg-center h-screen" id="home" style="background-image: url('{{ asset('bg_homepage.jpg') }}');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative z-10 flex items-start justify-center h-full text-center text-white px-6 pt-20">
            <div>
                <h1 class="text-4xl md:text-8xl font-bold mb-4 text-center">Vroom<span class="text-blue-500">Wash</span></h1>
                <h2 class="text-4xl md:text-4xl font-bold mb-3 text-center mt-10">Solusi Modern Untuk Layanan</h2>
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Cuci Mobil Anda</h2>
                <p class="text-xl md:text-2xl text-gray-300">Cepat, Praktis & Langsung Mengkilap!</p>
            </div>
        </div>
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-800/100"></div>
    </header>

    @include('include.ourservice')
    @include('include.contactus')
    @include('include.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>