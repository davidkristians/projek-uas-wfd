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
    body, html {
        height: 100%;
        overflow: hidden;
        font-family: 'Poppins';
    }
</style>
<body>
    <!-- <h1>Selamat datang User!</h1>
    <li>
        <a href="{{ route('logout') }}" onclick="confirmLogout()" class="flex items-center p-2 hover:bg-teal-700 rounded"> -->
         <!-- Icon -->
            <!-- <img src="{{ asset('logout.png') }}" alt="Data" class="w-6 h-6 mr-5">
                Log Out
        </a>
    </li> -->

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
    

    <!-- Main Content -->
  <main class="flex mt-20 h-[calc(100vh-4rem)] p-6 gap-6 overflow-hidden bg-gradient-to-br from-[#1B2845] to-[#003049]">
    <!-- Left Section -->
    <section class="flex w-screen bg-gradient-to-tl from-[#000000]/30 to-[#ffffff]/30 rounded-3xl px-5 py-6 overflow-hidden gap-6">
        <!-- LEFT SECTION WRAP -->
        <div class="flex-wrap w-full">
            <h1 class="text-6xl text-white font-bold ">Book Now</h1>
            <p class="text-lg text-gray-300 mb-6">Choose Your Car Wash Services</p>
            <!-- 3 CARD BOOKING OPTIONS -->
            <div class="flex space-x-6 mb-3">
                <div class="bg-gradient-to-tl from-[#3B82F6] to-[#1E3A8A] text-[#1B2845] p-2 rounded-xl w-44 h-44 text-center">
                    <!-- <img src="{{ asset('basicwash.svg') }}" alt="basic" class="h-12 mx-auto mb-2"> -->
                     <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" style="max-height:500px" viewBox="-2.027 -0.55 104.324 100.44" class="mx-auto my-2 fill-white">
                        <path d="M89.555 47.117 79.524 27.058a9.328 9.328 0 0 0-8.387-5.184H28.864a9.328 9.328 0 0 0-8.386 5.184L10.447 47.117a9.38 9.38 0 0 0-7.32 9.133V75a9.362 9.362 0 0 0 6.25 8.8v9.95c0 .828.327 1.625.913 2.21a3.128 3.128 0 0 0 2.211.915h9.375c.828 0 1.625-.328 2.211-.914a3.128 3.128 0 0 0 .914-2.211v-9.375h50v9.375c0 .828.328 1.625.914 2.21a3.128 3.128 0 0 0 2.211.915h9.375c.828 0 1.625-.328 2.211-.914a3.128 3.128 0 0 0 .914-2.211V83.8a9.361 9.361 0 0 0 6.25-8.8V56.25a9.38 9.38 0 0 0-7.32-9.133zM26.067 29.851a3.114 3.114 0 0 1 2.797-1.727h42.273a3.114 3.114 0 0 1 2.797 1.727l8.508 17.023H17.559zm64.559 45.148a3.124 3.124 0 0 1-3.125 3.125h-75a3.124 3.124 0 0 1-3.125-3.125v-18.75a3.124 3.124 0 0 1 3.125-3.125h75a3.124 3.124 0 0 1 3.125 3.125zm-9.375-9.375a4.689 4.689 0 0 1-8.004 3.316 4.689 4.689 0 1 1 8.004-3.316zm-53.125 0a4.689 4.689 0 0 1-8.004 3.316 4.689 4.689 0 1 1 8.004-3.316zm34.375 0c0 .828-.328 1.625-.914 2.21a3.128 3.128 0 0 1-2.211.915h-18.75a3.124 3.124 0 1 1 0-6.25h18.75c.828 0 1.625.328 2.21.914.587.586.915 1.383.915 2.21zM28.454 11.101l3.125-6.25a3.122 3.122 0 0 1 1.809-1.57 3.12 3.12 0 0 1 3.957 1.976c.261.79.199 1.649-.172 2.39l-3.125 6.25a3.126 3.126 0 0 1-5.594-2.797zm18.75 0 3.125-6.25a3.122 3.122 0 0 1 1.809-1.57 3.12 3.12 0 0 1 3.957 1.976c.261.79.199 1.649-.172 2.39l-3.125 6.25a3.126 3.126 0 0 1-5.594-2.797zm18.75 0 3.125-6.25a3.126 3.126 0 0 1 5.594 2.797l-3.125 6.25a3.126 3.126 0 0 1-5.594-2.797z"/></svg>
                    <p class="text-xl text-white text-left font-bold">Basic Wash</p>
                    <p class="text-base text-left text-green-400">$10</p>
                    <button class="mt-2 bg-cyan-700 text-white px-3 py-1 rounded-full text-sm">Select</button>
                </div>

                <div class="bg-gradient-to-tl from-[#af9e00] to-[#744b00] p-2 rounded-xl w-44 h-44 text-center">
                    <!-- <img src="{{ asset('insidewash.svg') }}" alt="inside" class="h-12 mx-auto mb-2"> -->
                     <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" style="max-height:500px" viewBox="-2.027 -0.55 104.324 100.44" class="mx-auto my-2 fill-white">
                        <path d="M56.25 65.625H42.188c-5.07 0-10.277.742-14.961 1.727l-11.883-33a4.662 4.662 0 0 0-1.383-1.985 6.225 6.225 0 0 0 1.664-4.238v-12.5a6.258 6.258 0 0 0-6.25-6.25H4.688A4.691 4.691 0 0 0 0 14.066v15.625c0 1.2.453 2.293 1.196 3.125a4.65 4.65 0 0 0-1.102 4.047l7.785 38.93a5 5 0 0 0-.062.774v3.125a4.69 4.69 0 0 0 3.125 4.418v8.082c0 .863.699 1.562 1.562 1.562h37.5c.864 0 1.563-.699 1.563-1.562v-7.813h4.687a4.691 4.691 0 0 0 4.688-4.687v-9.375a4.691 4.691 0 0 0-4.688-4.688zM3.125 14.063c0-.86.703-1.562 1.563-1.562h4.687a3.13 3.13 0 0 1 3.125 3.125v12.5a3.13 3.13 0 0 1-3.125 3.125H4.687c-.859 0-1.562-.704-1.562-1.563zm7.633 58.148a4.08 4.08 0 0 0-.375.172L3.156 36.242c-.094-.461.024-.934.324-1.297.297-.363.739-.57 1.211-.57h6.25c.657 0 1.25.414 1.47 1.03l11.75 32.642c-7.47 1.812-13.009 4.008-13.399 4.164zm37.68 18.414H14.063v-6.25h34.375zm9.375-10.938c0 .86-.703 1.563-1.563 1.563H12.5c-.86 0-1.562-.704-1.562-1.563v-3.125c0-.64.383-1.21.984-1.453.649-.258 16.062-6.36 30.266-6.36H56.25c.86 0 1.563.704 1.563 1.563zM98.438 48.438h-5.227a7.76 7.76 0 0 0-5.523 2.29l-1.105 1.105-9.641-9.641 7.625-7.625c.883-.883 1.375-2.063 1.375-3.313s-.488-2.43-1.375-3.312a4.664 4.664 0 0 0-3.313-1.375 4.64 4.64 0 0 0-3.312 1.375L56.067 49.817a4.664 4.664 0 0 0-1.375 3.313 4.64 4.64 0 0 0 1.375 3.312 4.664 4.664 0 0 0 3.312 1.375 4.64 4.64 0 0 0 3.313-1.375l7.625-7.625 9.64 9.64-5.792 5.794a7.76 7.76 0 0 0-2.29 5.523v22.414c0 .863.7 1.563 1.563 1.563h25c.863 0 1.562-.7 1.562-1.563V50c0-.863-.699-1.563-1.562-1.563zm-37.957 5.793c-.297.297-.688.457-1.105.457a1.56 1.56 0 0 1-1.563-1.563c0-.417.164-.812.457-1.105l21.875-21.875c.297-.297.688-.457 1.106-.457a1.557 1.557 0 0 1 1.562 1.563c0 .418-.164.812-.457 1.105zm12.043-7.621 2.21-2.211 9.642 9.64-2.211 2.211zm24.352 44.016H75.001V69.774c0-1.25.488-2.43 1.375-3.313l13.523-13.523a4.664 4.664 0 0 1 3.313-1.375h3.664zM50 23.438c0 .863.7 1.563 1.563 1.563a4.691 4.691 0 0 1 4.687 4.687 1.562 1.562 0 1 0 3.125 0A4.691 4.691 0 0 1 64.063 25a1.562 1.562 0 1 0 0-3.125 4.691 4.691 0 0 1-4.688-4.687 1.562 1.562 0 1 0-3.125 0 4.691 4.691 0 0 1-4.688 4.688c-.863 0-1.562.699-1.562 1.562zm7.813-1.566a7.935 7.935 0 0 0 1.566 1.566 7.935 7.935 0 0 0-1.566 1.566 7.935 7.935 0 0 0-1.567-1.566 7.935 7.935 0 0 0 1.566-1.566zM31.25 18.75c4.309 0 7.813 3.504 7.813 7.813a1.562 1.562 0 1 0 3.124 0c0-4.31 3.504-7.813 7.813-7.813a1.562 1.562 0 1 0 0-3.125c-4.309 0-7.813-3.504-7.813-7.813a1.562 1.562 0 1 0-3.124 0c0 4.31-3.504 7.813-7.813 7.813a1.562 1.562 0 1 0 0 3.125zm9.375-5.309a11.052 11.052 0 0 0 3.746 3.746 11.052 11.052 0 0 0-3.746 3.747 11.052 11.052 0 0 0-3.746-3.747 11.052 11.052 0 0 0 3.746-3.746z"/></svg>
                    <p class="text-xl text-left text-white font-bold mb-1">Inside Wash</p>
                    <p class="text-base text-left text-green-400">$15</p>
                    <button class="mt-2 bg-cyan-700 text-white px-3 py-1 rounded-full text-sm">Select</button>
                </div>

                <div class="bg-gradient-to-tl from-[#5c5c5c] to-[#292929] p-2 rounded-xl w-44 h-44 text-center">
                    <!-- <img src="{{ asset('premiumwash.svg') }}" alt="premium" class="h-12 mx-auto mb-2"> -->
                     <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" style="max-height:500px" viewBox="4.73 5.66 91.081 88.83" class="mx-auto my-2 fill-white">
                        <path d="M80.805 55.945a5.033 5.033 0 0 0-5.023-5.027h-.899c-.715 0-1.414.148-2.074.445l-.867.39-.528-1.984A11.172 11.172 0 0 0 60.63 41.48H39.363c-5.05 0-9.484 3.41-10.785 8.29l-.527 1.984-.867-.391a4.997 4.997 0 0 0-2.07-.445h-.899a5.03 5.03 0 0 0-5.023 5.027 5.03 5.03 0 0 0 5.023 5.023h.606l-3.871 4.703a7.736 7.736 0 0 0-1.758 4.899v16.289a4.56 4.56 0 0 0 4.554 4.555H29.7a4.56 4.56 0 0 0 4.554-4.555v-2.723h31.484v2.723a4.56 4.56 0 0 0 4.555 4.555h5.953a4.56 4.56 0 0 0 4.555-4.555v-16.29a7.728 7.728 0 0 0-1.758-4.898l-3.875-4.703h.605a5.03 5.03 0 0 0 5.024-5.023zm-6.61-1.508c.22-.097.45-.148.688-.148h.899a1.658 1.658 0 0 1 0 3.316h-2.278l-.68-2.547zm-51.632 1.508c0-.914.742-1.66 1.656-1.66h.898c.239 0 .469.054.684.148l1.375.621-.68 2.543H24.22a1.657 1.657 0 0 1-1.656-1.656zm8.324 30.922c0 .656-.531 1.188-1.184 1.188H23.75a1.186 1.186 0 0 1-1.183-1.188v-2.723h8.324v2.723zm13.19-6.207.65-2.05a1.078 1.078 0 0 1 1.034-.755h7.036c.476 0 .89.305 1.035.754l.652 2.051h-10.41zm33.356 6.207c0 .656-.531 1.188-1.184 1.188h-5.953a1.186 1.186 0 0 1-1.183-1.188v-2.723h8.324v2.723zm0-16.289v10.199H58.058l-1.016-3.188a4.437 4.437 0 0 0-4.242-3.101h-7.035a4.433 4.433 0 0 0-4.242 3.101l-1.012 3.188-17.945-.004V70.574c0-1.004.351-1.984.992-2.758l4.543-5.52a6.731 6.731 0 0 0 1.324-2.577l2.414-9.082a7.803 7.803 0 0 1 7.528-5.79h21.266a7.803 7.803 0 0 1 7.527 5.79l2.414 9.082c.254.945.7 1.816 1.328 2.582l4.54 5.515c.64.774.991 1.758.991 2.758z"/><path d="M29.367 68.691h7.055c.773 0 1.402.773 1.402 1.402v3.13c0 .773-.629 1.402-1.402 1.402h-7.055c-.773 0-1.402-.774-1.402-1.403v-3.129c0-.773.629-1.402 1.402-1.402zM62.801 68.691h7.055c.773 0 1.402.773 1.402 1.402v3.13c0 .773-.629 1.402-1.402 1.402H62.8c-.773 0-1.402-.774-1.402-1.403v-3.129c0-.773.629-1.402 1.402-1.402zM34.59 62.652h30.82l1.5 3 3.012-1.508-1.875-3.75-1.946-8.351a6.561 6.561 0 0 0-6.422-5.098H40.32a6.564 6.564 0 0 0-6.421 5.098l-1.946 8.351-1.875 3.75 3.012 1.508zm2.59-9.848a3.207 3.207 0 0 1 3.14-2.492h19.36c1.507 0 2.8 1.024 3.14 2.492l1.508 6.477-28.656.004 1.508-6.477z"/><path d="M53.133 67.965h-7.086l-3.437-3.438-2.383 2.383 4.426 4.426H54.73l3.718-4.55-2.605-2.133zM17.441 42.031c0-3.32-2.7-6.023-6.023-6.023H8.613v3.367h2.805a2.657 2.657 0 0 1 2.652 2.652 2.657 2.657 0 0 1-2.652 2.652H8.613v3.368h2.805a2.657 2.657 0 0 1 2.652 2.652 2.657 2.657 0 0 1-2.652 2.652H8.613v3.367h2.805a2.657 2.657 0 0 1 2.652 2.653 2.657 2.657 0 0 1-2.652 2.652H8.613v3.367h2.805a2.657 2.657 0 0 1 2.652 2.652 2.657 2.657 0 0 1-2.652 2.653H8.613v3.367h2.805a2.657 2.657 0 0 1 2.652 2.652 2.66 2.66 0 0 1-2.652 2.656H8.613v3.368h2.805c1.46 0 2.652 1.191 2.652 2.652s-1.191 2.652-2.652 2.652H8.613v3.367h2.805c3.32 0 6.023-2.699 6.023-6.023a5.983 5.983 0 0 0-1.867-4.336 5.997 5.997 0 0 0 1.867-4.336 5.98 5.98 0 0 0-1.863-4.336 5.993 5.993 0 0 0 1.863-4.336 5.98 5.98 0 0 0-1.863-4.335 5.993 5.993 0 0 0 1.863-4.336 5.98 5.98 0 0 0-1.863-4.336 5.993 5.993 0 0 0 1.863-4.336 5.98 5.98 0 0 0-1.863-4.336 5.993 5.993 0 0 0 1.863-4.336zM82.559 42.031a5.98 5.98 0 0 0 1.863 4.336 5.993 5.993 0 0 0-1.863 4.336 5.98 5.98 0 0 0 1.863 4.336 5.993 5.993 0 0 0-1.863 4.336 5.98 5.98 0 0 0 1.863 4.336 5.993 5.993 0 0 0-1.863 4.335 5.98 5.98 0 0 0 1.863 4.336 5.993 5.993 0 0 0-1.863 4.336c0 1.707.723 3.242 1.867 4.336a5.997 5.997 0 0 0-1.867 4.336c0 3.32 2.7 6.023 6.023 6.023h2.805v-3.367h-2.805a2.657 2.657 0 0 1-2.652-2.652 2.657 2.657 0 0 1 2.652-2.652h2.805v-3.368h-2.805a2.655 2.655 0 0 1 0-5.308h2.805v-3.367h-2.805c-1.46 0-2.652-1.192-2.652-2.653s1.191-2.652 2.652-2.652h2.805v-3.367h-2.805c-1.46 0-2.652-1.191-2.652-2.652s1.191-2.653 2.652-2.653h2.805v-3.367h-2.805c-1.46 0-2.652-1.191-2.652-2.652s1.191-2.652 2.652-2.652h2.805v-3.368h-2.805c-1.46 0-2.652-1.191-2.652-2.652s1.191-2.652 2.652-2.652h2.805v-3.367h-2.805c-3.32 0-6.023 2.699-6.023 6.023zM86.273 14.777h-3.965c-1.023-3.566-4.273-6.2-8.164-6.2H25.851c-3.89 0-7.144 2.634-8.164 6.2h-3.965c-3.836 0-6.957 3.117-6.957 6.953v9.711h3.367v-9.71a3.59 3.59 0 0 1 3.586-3.587h3.602v5.942h65.359v-5.942h3.601a3.59 3.59 0 0 1 3.586 3.586v9.711h3.368v-9.71c0-3.837-3.121-6.954-6.957-6.954zm-6.969 5.941H20.695V17.11a5.17 5.17 0 0 1 5.164-5.164h48.29a5.17 5.17 0 0 1 5.163 5.164v3.61z"/></svg>
                    <p class="text-xl text-left font-bold mb-1 bg-gradient-to-l from-[#ffffff] to-[#797979] bg-clip-text text-transparent">Premium Wash</p>
                    <p class="text-base text-left text-green-600">$300</p>
                    <button class="mt-2 bg-cyan-700 text-white px-3 py-1 rounded-full text-sm">Select</button>
                </div>
                <!-- 3 CARD BOOKING OPTIONS END -->
            </div>

            <!-- DATE & LOCATIONS SECTION -->
            <div class="mb-2">
                <label class="block text-sm text-white mb-1">Enter your location</label>
                <input type="text" placeholder="Your Location (ex. Jalan Siwalankerto Blok DX, No. X, RT X/RW X, Wonocolo, Surabaya" class="w-full p-2 rounded-full text-black" />
            </div>
            <div class="mb-4">
                <label class="block text-sm text-white mb-1">Date & Time</label>
                <div class="flex space-x-4 mb-6">
                    <input type="date" placeholder="📅 DD/MM/YY" class="w-1/2 p-2 rounded-full text-black" />
                    <input type="time" placeholder="⏰ XX:YY" class="w-1/2 p-2 rounded-full text-black" />
                </div>
            </div>
            <button class="bg-cyan-700 px-6 py-2 rounded-full text-white font-semibold">Book Now</button>
            <!-- END DATE & LOCATIONS -->
        </div>
      
    <!-- Right Section -->
    <aside class="max-w-[22rem] flex flex-col gap-6">
        <!-- Rewards -->
        <div class="bg-gradient-to-tl from-[#000000]/20 to-[#ffffff]/20 p-6 rounded-3xl">
            <div class="flex items-center justify-between mb-2">
                <span class="text-xl text-white font-bold">Daily Rewards</span>
                <span class="text-2xl">👥</span>
            </div>
            <p class="text-sm text-gray-300 mb-2">Free Voucher</p>
            <div class="bg-white text-[#1B2845] p-3 rounded-xl flex justify-between items-center">
                <span>
                    <span class="text-lg text-cyan-700 font-bold block">$10 Voucher</span>
                    <small class="text-xs text-gray-600">min. spend $25</small>
                </span>
            <button class="bg-cyan-700 transform hover:bg-sky-400 text-white px-3 py-1 rounded-full text-sm">Claim</button>
            </div>
        </div>

      <!-- What's New -->
      <div class="bg-gradient-to-tl from-[#000000]/20 to-[#ffffff]/20 p-6 rounded-3xl">
        <h2 class="text-xl text-white font-bold mb-2">What’s New?</h2>
        <img src="{{ asset('dj-khaled.jpg') }}" alt="news" class="rounded-xl mb-2 w-screen h-16 object-[0%_10%] object-cover">
        <p class="text-sm text-gray-300 leading-tight break-words">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam est dignissimos iusto fugit dolor adipisci illo in ducimus quaerat fugiat rerum quibusdam cumque voluptas vero facilis, earum repellat magnam quam quidem veniam animi sequi molestias voluptatum! At deserunt in atque.
        </p>
      </div>
    </aside>
    </section>

    
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