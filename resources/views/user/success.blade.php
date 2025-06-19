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
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-gradient-to-br from-[#1B2845] to-[#003049] overflow-x-hidden font-[Poppins]">
    <!-- Navbar -->
    @include('include.navbar_user')

    <!-- Main -->
    <main class="mt-24 px-4 lg:px-8 pt-4 max-w-8xl mx-auto">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Left -->
            <section class="flex-1 bg-gradient-to-tl from-[#000000]/30 to-[#ffffff]/30 backdrop-blur-md p-8 rounded-3xl">
                <h1 class="text-6xl lg:text-8xl text-white font-bold mb-2 mt-12">Booking</h1>
                <h1 class="text-6xl lg:text-8xl text-white font-bold mb-5">Successful!</h1>
                <a href="{{ route('dashboard.user') }}" class="bg-cyan-700 text-white px-8 py-2 rounded hover:bg-white hover:!text-black font-semibold">Home</a>
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

</body>

<!-- JS -->

</html>