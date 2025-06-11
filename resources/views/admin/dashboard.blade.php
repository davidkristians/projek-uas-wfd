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

<body class="bg-blue-800 font-sans">
    <form method="POST" action="{{ route('logout') }}" id="logout-form">
        @csrf
        <!-- Tombol logout dalam bentuk link dengan gambar di samping -->
        <a href="#" onclick="confirmLogout()" class="d-inline-flex align-items-center text-white text-decoration-none">
            <img src="{{ asset('logout.png') }}" alt="Logout Icon" width="20" height="20" class="me-2">
            Logout
        </a>
    </form>

    <form action="{{ route('data') }}" method="GET" id="data-form">
        <a href="#" onclick="document.getElementById('data-form').submit();"class="d-inline-flex align-items-center text-white text-decoration-none">
            <img src="{{ asset('data_icon.png') }}" alt="Logout Icon" width="20" height="20" class="me-2">
            Data
        </a>
    </form>
    <form action="{{ route('data') }}">
        <a href="#"class="d-inline-flex align-items-center text-white text-decoration-none">
            <img src="{{ asset('plus.png') }}" alt="Logout Icon" width="20" height="20" class="me-2">
            Tambah Karyawan
        </a>
    </form>

            


    <script>
        function confirmLogout() {
            if (confirm("Are You Sure Want to Logout?")) {
                document.getElementById('logout-form').submit();
            }
        }
    </script>

</body>
</html>