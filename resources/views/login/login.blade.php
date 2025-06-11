<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VroomWash</title>
    <link rel="icon" href="{{ asset('icon_vroom.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body class="bg-gray-100 font-sans flex items-center justify-center min-h-screen">
    <div class="flex w-full max-w-4xl bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Left Side (Image) -->
        <div class="w-1/2 bg-gray-200 flex items-center justify-center">
            <div class="text-center p-6">
                <img src="{{ asset('nasdaily.jpg') }}" alt="NasDaily" class="w-80 h-80 rounded-full object-cover mx-auto mb-4">
                <h2 class="text-2xl font-bold text-gray-800">Hi!</h2>
                <h2 class="text-2xl font-semibold text-gray-800">I'm NasDaily,</h2>
                <p class="text-xl text-gray-600">and I wash my car here</p>
            </div>
        </div>

        <!-- Right Side (Login Form) -->
        <div class="w-1/2 p-8 flex flex-col justify-center">
            <div class="text-center mb-6">
                <img src="{{ asset('vroom_icon_web.jpg') }}" alt="VroomWash Logo" class="w-12 h-12 mx-auto mb-2">
                <h1 class="text-2xl font-bold text-gray-800">VroomWash</h1>
            </div>

            @if (session('success'))
                <div class="alert alert-success text-sm text-green-700 bg-green-100 border border-green-300 p-2 rounded mb-4 text-center">
                    {{ session('success') }}
                </div>
            @endif

            <div class="text-center mb-6">
                <button class="w-full bg-white border border-gray-300 text-gray-700 py-2 rounded-lg flex items-center justify-center hover:bg-gray-50">
                    <img src="{{ asset('google.png') }}" alt="Google" class="w-5 h-5 mr-2">
                    Sign In with Google
                </button>
                <p class="text-gray-500 mt-4">or</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf
                <!-- email -->
                <div>
                    <p class="mb-1 text-gray-700 text-xs font-semibold">Email</p>
                    <input name="email" type="email" placeholder="Email Address" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <!-- password -->
                <div>
                    <p class="mb-1 text-gray-700 text-xs font-semibold">Password</p>
                    <input name="password" type="password" placeholder="Password" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Continue</button>
            </form>

            <p class="text-center text-gray-500 text-sm mt-4">
                Don't have an account? <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Sign up</a>
            </p>
            <p class="text-center text-gray-500 text-xs mt-2">
                By creating a VroomWash account, you agree to the <a href="#" class="text-blue-600 hover:underline">Terms of Service</a> and <a href="#" class="text-blue-600 hover:underline">Privacy Policy</a>, and you understand and agree this website is powered by MC4P and the Google Privacy and Terms apply.
            </p>
        </div>
    </div>
</body>
</html>