@extends('base.dashboard_admin')

@section('laporan')
<div class="text-center justify-center items-center flex-grow flex flex-col mt-8 w-full px-4">
    <h1 class="mb-6 text-4xl font-bold">Laporan</h1>
    <h2 class="mb-6 text-xl">Filter Untuk Menemukan Pelaporan Yang Diinginkan</h2>

    <!-- Form Filter Jenis Laporan -->
    <form method="GET" action="{{ route('laporan') }}" class="mb-6 space-x-4">
        <label for="filter" class="font-semibold">Pilih Jenis Laporan:</label>
        <select name="filter" id="filter" onchange="this.form.submit()" class="border p-2 rounded text-black mr-2">
            <option value="keuangan" {{ request('filter') == 'keuangan' ? 'selected' : '' }}>Laporan Keuangan</option>
            <option value="layanan" {{ request('filter') == 'layanan' ? 'selected' : '' }}>Layanan Terpopuler</option>
            <option value="user" {{ request('filter') == 'user' ? 'selected' : '' }}>User Aktif</option>
        </select>

        @if(request('filter') == 'keuangan')
        <label class="font-semibold">Metode:</label>
        <select name="metode" onchange="this.form.submit()" class="text-black border p-2 rounded">
            <option value="">Semua Metode</option>
            <option value="cod" {{ request('metode') == 'cod' ? 'selected' : '' }}>COD</option>
            <option value="debit" {{ request('metode') == 'debit' ? 'selected' : '' }}>Debit</option>
            <option value="e-money" {{ request('metode') == 'e-money' ? 'selected' : '' }}>E-Money</option>
            <option value="bank-transfer" {{ request('metode') == 'bank-transfer' ? 'selected' : '' }}>Transfer Bank</option>
        </select>
        @endif

        @if(in_array(request('filter'), ['layanan', 'user']))
        <label class="font-semibold">Urutan:</label>
        <select name="sort" onchange="this.form.submit()" class="text-black border p-2 rounded">
            <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>DESCENDING</option>
            <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>ASCENDING</option>
        </select>
        @endif
    </form>

    <!-- Laporan Keuangan -->
    @if($filter === 'keuangan')
    <div class="w-full mx-auto bg-white rounded shadow p-6">
        <h2 class="mb-4 text-2xl font-bold text-blue-700">Laporan Keuangan</h2>
        <table class="w-full text-left border-collapse table-fixed">
            <thead>
                <tr class="bg-blue-800 text-white text-center">
                    <th class="p-2 border min-w-[80px]">Tanggal</th>
                    <th class="p-2 border min-w-[80px]">Jam</th>
                    <th class="p-2 border min-w-[80px]">User</th>
                    <th class="p-2 border min-w-[80px]">Layanan</th>
                    <th class="p-2 border min-w-[80px]">Total Harga</th>
                    <th class="p-2 border min-w-[80px]">Metode</th>
                </tr>
            </thead>
            <tbody>
                @forelse($laporanKeuangan as $booking)
                <tr class="border-b hover:bg-blue-100 text-center text-black">
                    <td class="p-2 border">{{ \Carbon\Carbon::parse($booking->date)->format('d-m-Y') }}</td>
                    <td class="p-2 border">{{ \Carbon\Carbon::parse($booking->time)->format('H:i') }}</td>
                    <td class="p-2 border">{{ $booking->user->name ?? '-' }}</td>
                    <td class="p-2 border">{{ $booking->layanan->nama ?? '-' }}</td>
                    <td class="p-2 border">Rp{{ number_format($booking->service_price, 0, ',', '.') }}</td>
                    <td class="p-2 border">{{ ucfirst($booking->payment_method) }}</td>
                </tr>
                @empty
                <tr><td colspan="6" class="p-2 border text-center">Tidak ada data</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Layanan Terpopuler -->
    @elseif($filter === 'layanan')
    <div class="w-full mx-auto bg-white rounded shadow p-6">
        <h2 class="mb-4 text-xl font-bold text-blue-800">Layanan Paling Sering Dipesan</h2>
        <table class="w-full text-left border-collapse table-fixed">
            <thead>
                <tr class="bg-blue-800 text-white text-center">
                    <th class="p-2 border">Layanan</th>
                    <th class="p-2 border">Jumlah Pesanan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($laporanLayanan as $item)
                <tr class="border-b hover:bg-blue-100 text-center text-black">
                    <td class="p-2 border">{{ $item->layanan->nama ?? '-' }}</td>
                    <td class="p-2 border">{{ $item->total }}</td>
                </tr>
                @empty
                <tr><td colspan="2" class="p-2 border text-center">Tidak ada data</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- User Aktif -->
    @elseif($filter === 'user')
    <div class="w-full mx-auto bg-white rounded shadow p-6">
        <h2 class="mb-4 text-xl font-bold text-blue-800">User yang Paling Sering Booking</h2>
        <table class="w-full text-left border-collapse table-fixed">
            <thead>
                <tr class="bg-blue-800 text-white text-center">
                    <th class="p-2 border">User</th>
                    <th class="p-2 border">Jumlah Booking</th>
                </tr>
            </thead>
            <tbody>
                @forelse($laporanUser as $item)
                <tr class="border-b hover:bg-blue-100 text-center text-black">
                    <td class="p-2 border">{{ $item->user->name ?? '-' }}</td>
                    <td class="p-2 border">{{ $item->total }}</td>
                </tr>
                @empty
                <tr><td colspan="2" class="p-2 border text-center">Tidak ada data</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection
