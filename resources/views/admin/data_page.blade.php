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

<body class="bg-blue-900 text-white d-flex justify-content-center align-items-center vh-100 m-0">

    <div class="text-center">
        <h1 class="mb-8 text-5xl fw-bold">Data Management</h1>
        <h1 class="mb-4 text-xl fw-bold">Pilih Data yang Ingin Ditampilkan</h1>
        <button class="btn btn-primary bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 m-2 rounded">
        Show Data Karyawan
        </button>

        <button
        class="btn btn-primary bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 m-2 rounded">
        Show Data Admin
        </button>

        <button
        class="btn btn-primary bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 m-2 rounded">
        Show Data Pengguna
        </button>
    </div>

    </body>
</html>