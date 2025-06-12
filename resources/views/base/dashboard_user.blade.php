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
<body>
    <h1>Selamat datang User!</h1>
    <li>
        <a href="{{ route('logout') }}" onclick="confirmLogout()" class="flex items-center p-2 hover:bg-teal-700 rounded">
         <!-- Icon -->
            <img src="{{ asset('logout.png') }}" alt="Data" class="w-6 h-6 mr-5">
                Log Out
        </a>
    </li>


    <script>
        function confirmLogout() {
            if (confirm("Are You Sure Want to Logout?")) {
                document.getElementById('logout-form').submit();
            }
        }
    </script>

    


</body>
</html>