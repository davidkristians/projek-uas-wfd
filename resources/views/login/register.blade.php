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

<body class="bg-gradient-to-br from-[#344d83] to-[#003049] flex items-center justify-center min-h-screen font-[Poppins]">
    <div class="flex w-full max-w-7xl bg-gradient-to-tl from-[#000000]/30 to-[#ffffff]/30 backdrop-blur shadow-lg rounded-lg overflow-hidden">
        <!-- Left Side (Image) -->
        <div class="w-1/2 bg-gray-300 flex items-center justify-center">
            <div class="text-center p-6">
                <img src="{{ asset('beckam.jpg') }}" alt="Beckam" class="w-80 h-80 rounded-full object-cover mx-auto mb-4">
                <h2 class="text-2xl font-bold text-gray-800">Hi!</h2>
                <h2 class="text-2xl font-semibold text-gray-800">I'm David Beckam,</h2>
                <p class="text-xl text-gray-600">and I Always Wash My Car Here</p>
            </div>
        </div>

        <!-- Right Side (Login Form) -->
        <div class="w-1/2 p-8 flex flex-col justify-center">
            <div class="text-center mb-6">
                <img src="{{ asset('vroom_icon_web.jpg') }}" alt="VroomWash Logo" class="w-12 h-12 mx-auto mb-2">
                <h1 class="text-2xl font-bold text-white">VroomWash</h1>
            </div>

            <div class="text-center">
                <button class="w-full bg-white border border-gray-300 text-gray-700 py-2 rounded-lg flex items-center justify-center hover:bg-gray-50">
                    <img src="{{ asset('google.png') }}" alt="Google" class="w-5 h-5 mr-2">
                    Sign Up with Google
                </button>
                <p class="text-gray-200 mt-4">or</p>
            </div>

            @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif


            <form class="grid grid-cols-1 md:grid-cols-2 gap-3 mt-4" method="POST" action="{{ route('register') }}">
                @csrf
                <div>
                    <p class="mb-1 text-white text-xs">Name</p>
                    <input name="name" type="text" value="{{ old('name') }}" placeholder="Full Name" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <p class="mb-1 text-white text-xs">Email</p>
                    <input name="email" type="email" value="{{ old('email') }}" placeholder="Email Address" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <p class="mb-1 text-white text-xs">Password</p>
                    <input name="password" type="password" value="{{ old('password') }}" placeholder="Password" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <p class="mb-1 text-white text-xs">Nomor Telepon</p>
                    <input type="text" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nomor_telepon') border-red-500 @enderror" name="nomor_telepon" value="{{ old('nomor_telepon') }}" placeholder="Nomor Telepon">
                    @error('nomor_telepon')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <p class="mb-1 text-white text-xs">Alamat Rumah</p>
                    <input type="text" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('alamat') border-red-500 @enderror" name="alamat" value="{{ old('alamat') }}" placeholder="Alamat">
                    @error('alamat')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <p class="mb-1 text-white text-xs">Jenis Kelamin</p>
                    <select class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('jenis_kelamin') border-red-500 @enderror" name="jenis_kelamin" value="{{ old('jenis_kelamin') }}">
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <p class="text-white col-span-2 font-bold">Catatan : Pastikan Email dan Jenis Kelamin sudah sesuai dengan Anda!</p>
                
                <button type="submit" class="w-full col-span-2 bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Continue
                </button>
            </form>

            <p class="text-center text-gray-300 text-sm mt-4">
                Already have an account? <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Sign in</a>
            </p>
            <p class="text-center text-gray-300 text-xs mt-2">
                By creating a VroomWash account, you agree to the <a href="#" class="text-blue-500 hover:underline">Terms of Service</a> and <a href="#" class="text-blue-500 hover:underline">Privacy Policy</a>, and you understand and agree this website is powered by MC4P and the Google Privacy and Terms apply.
            </p>
        </div>
    </div>
</body>
</html>